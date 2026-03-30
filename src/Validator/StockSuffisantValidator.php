<?php
namespace App\Validator;

use App\Entity\Badge;
use App\Entity\StockBadge;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class StockSuffisantValidator extends ConstraintValidator
{
    public function __construct(private EntityManagerInterface $entityManager)
    {}

    public function validate(mixed $value, Constraint $constraint): void
    {

        // ON MET LE PIÈGE ICI :
        // dd('BINGO ! Le validateur est bien appelé !');

        // 1. On s'assure qu'on est bien en train d'inspecter un Badge
        if (! $value instanceof Badge) {
            return;
        }

        // 2. SÉCURITÉ CRUCIALE : Si le badge a déjà un ID, c'est une modification (ex: on le déclare Perdu).
        // Dans ce cas, on s'en fiche du stock, on laisse passer !
        if ($value->getId() !== null) {
            return;
        }

        $couleur = $value->getCouleur();
        $lot     = $value->getLot();

        // // 🛑 NOTRE NOUVEAU PIÈGE POUR VOIR CE QUI MANQUE :
        // dd([
        //     '1. Couleur choisie ?' => $couleur ? 'OUI' : 'NON',
        //     '2. Lot choisi ?'      => $lot ? 'OUI' : 'NON',
        //     '3. Bâtiment lié ?'    => ($lot && $lot->getBatiment()) ? 'OUI' : 'NON',
        //     '4. Copro trouvée ?'   => ($lot && $lot->getBatiment() && $lot->getBatiment()->getCopropriete()) ? 'OUI' : 'NON',
        // ]);

        // 3. S'il manque des infos, on laisse passer (les autres champs obligatoires bloqueront si besoin)
        if (! $couleur || ! $lot || ! $lot->getBatiment() || ! $lot->getBatiment()->getCopropriete()) {
            return;
        }

        $copropriete = $lot->getBatiment()->getCopropriete();

        // 4. On cherche le stock correspondant
        $stock = $this->entityManager->getRepository(StockBadge::class)->findOneBy([
            'couleur'     => $couleur,
            'copropriete' => $copropriete,
        ]);

        // // 🛑 NOUVEAU PIÈGE : On regarde ce qu'il a trouvé !
        // dd([
        //     '5. Stock trouvé en BDD ?' => $stock ? 'OUI' : 'NON',
        //     '6. Quantité lue :'        => $stock ? $stock->getQuantite() : 'Inconnue',
        // ]);

        // 5. LE COUPERET : Si le stock est à 0 (ou en dessous), on déclenche l'erreur !
        if ($stock && $stock->getQuantite() <= 0) {
            $this->context->buildViolation($constraint->message)
                ->addViolation();
        }
    }
}
