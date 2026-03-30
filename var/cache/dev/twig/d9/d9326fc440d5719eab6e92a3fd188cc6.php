<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* resident/index10.html.twig */
class __TwigTemplate_535ef41148536db82040431be5af385b extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "resident/index10.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "resident/index10.html.twig"));

        $this->parent = $this->load("base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        yield "<div class=\"container-fluid px-4\">
    
    <div class=\"d-flex justify-content-center align-items-center mb-4\">
        <h2 class=\"h4 fw-bold text-dark m-4\"><i class=\"fas fa-desktop me-2 text-primary\"></i>Tableau de bord Résident</h2>
    </div>

    ";
        // line 13
        yield "    <div class=\"row g-4 mb-4\">
        
        ";
        // line 16
        yield "        <div class=\"col-md-4\">
            <div class=\"card shadow-sm border-0\">
                <div class=\"card-header bg-primary text-white py-3\">
                    <h6 class=\"mb-0 fw-bold\"><i class=\"fas fa-list me-2\"></i>Mes Biens (";
        // line 19
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["lots"]) || array_key_exists("lots", $context) ? $context["lots"] : (function () { throw new RuntimeError('Variable "lots" does not exist.', 19, $this->source); })())), "html", null, true);
        yield ")</h6>
                </div>
                <div class=\"list-group list-group-flush sidebar-lots\" id=\"list-tab\" role=\"tablist\">
                    ";
        // line 22
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["lots"]) || array_key_exists("lots", $context) ? $context["lots"] : (function () { throw new RuntimeError('Variable "lots" does not exist.', 22, $this->source); })()));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["lot"]) {
            // line 23
            yield "                        <a class=\"list-group-item list-group-item-action ";
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 23)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("active") : (""));
            yield " p-3\" 
                           id=\"tab-";
            // line 24
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "id", [], "any", false, false, false, 24), "html", null, true);
            yield "-list\" data-bs-toggle=\"list\" href=\"#tab-";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "id", [], "any", false, false, false, 24), "html", null, true);
            yield "\" role=\"tab\">
                            <div class=\"d-flex justify-content-between align-items-center\">
                                <strong class=\"text-uppercase\">Lot ";
            // line 26
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "numeroLot", [], "any", false, false, false, 26), "html", null, true);
            yield "</strong>
                                <span class=\"badge bg-light text-dark border small\">";
            // line 27
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "type", [], "any", false, false, false, 27), "html", null, true);
            yield "</span>
                            </div>
                            <small class=\"text-muted\">";
            // line 29
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "batiment", [], "any", false, false, false, 29), "nom", [], "any", false, false, false, 29), "html", null, true);
            yield "</small>
                        </a>
                    ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['lot'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 32
        yield "                </div>
            </div>
        </div>

        ";
        // line 37
        yield "        <div class=\"col-lg-8 col-md-4\">
            <div class=\"tab-content\" id=\"nav-tabContent\">
                ";
        // line 39
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["lots"]) || array_key_exists("lots", $context) ? $context["lots"] : (function () { throw new RuntimeError('Variable "lots" does not exist.', 39, $this->source); })()));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["lot"]) {
            // line 40
            yield "                    <div class=\"tab-pane fade ";
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 40)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("show active") : (""));
            yield "\" id=\"tab-";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "id", [], "any", false, false, false, 40), "html", null, true);
            yield "\" role=\"tabpanel\">
                        <div class=\"row g-3\">
                            
                            ";
            // line 44
            yield "                            <div class=\"col-md-8 \">
                                <div class=\"card shadow-sm border-0 lot-main-box p-4 justify-content-between align-items-center\">
                                    <div class=\"d-flex justify-content-between align-items-center \">
                                        <h3 class=\"h4 fw-bold mb-0 mx-4\">Fiche du Lot ";
            // line 47
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "numeroLot", [], "any", false, false, false, 47), "html", null, true);
            yield "</h3>
                                        ";
            // line 48
            $context["is_proprio"] = (CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 48, $this->source); })()), "user", [], "any", false, false, false, 48) == CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "proprietaire", [], "any", false, false, false, 48));
            // line 49
            yield "                                        <span class=\"badge ";
            yield (((($tmp = (isset($context["is_proprio"]) || array_key_exists("is_proprio", $context) ? $context["is_proprio"] : (function () { throw new RuntimeError('Variable "is_proprio" does not exist.', 49, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("bg-primary") : ("bg-success"));
            yield " px-3 py-2 rounded-pill\">
                                            ";
            // line 50
            yield (((($tmp = (isset($context["is_proprio"]) || array_key_exists("is_proprio", $context) ? $context["is_proprio"] : (function () { throw new RuntimeError('Variable "is_proprio" does not exist.', 50, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("PROPRIÉTAIRE") : ("LOCATAIRE"));
            yield "
                                        </span>
                                    </div>

                                    ";
            // line 55
            yield "                                    <div class=\"row bg-light rounded py-3 mb-4 border mx-0 text-center\">
                                        <div class=\"col-4 border-end\"><small class=\"text-muted d-block small\">Bâtiment</small><strong>";
            // line 56
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "batiment", [], "any", false, false, false, 56), "nom", [], "any", false, false, false, 56), "html", null, true);
            yield "</strong></div>
                                        <div class=\"col-4 border-end\"><small class=\"text-muted d-block small\">Étage</small><strong>";
            // line 57
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "etage", [], "any", false, false, false, 57), "html", null, true);
            yield "</strong></div>
                                        <div class=\"col-4\"><small class=\"text-muted d-block small\">Position</small><strong>";
            // line 58
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "position", [], "any", true, true, false, 58)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "position", [], "any", false, false, false, 58), "N/C")) : ("N/C")), "html", null, true);
            yield "</strong></div>
                                    </div>

                                    ";
            // line 62
            yield "                                    <h6 class=\"fw-bold mb-3 small text-uppercase text-muted\">Badges d'accès liés</h6>
                                    <div class=\"d-flex flex-wrap gap-2\">
                                        ";
            // line 64
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "badges", [], "any", false, false, false, 64));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["_key"] => $context["badge"]) {
                // line 65
                yield "                                            <div class=\"badge-item\">
                                                <i class=\"fas fa-key me-2 text-warning\"></i>
                                                <code class=\"me-2 text-dark fw-bold\">";
                // line 67
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["badge"], "numeroHexa", [], "any", false, false, false, 67), "html", null, true);
                yield "</code>
                                                <span class=\"badge bg-";
                // line 68
                yield (((Twig\Extension\CoreExtension::lower($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["badge"], "status", [], "any", false, false, false, 68)) == "actif")) ? ("success") : ("danger"));
                yield " small\" style=\"font-size: 0.6rem;\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["badge"], "status", [], "any", false, false, false, 68)), "html", null, true);
                yield "</span>
                                            </div>
                                        ";
                $context['_iterated'] = true;
            }
            // line 70
            if (!$context['_iterated']) {
                // line 71
                yield "                                            <p class=\"text-muted small\">Aucun badge enregistré.</p>
                                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['badge'], $context['_parent'], $context['_iterated']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 73
            yield "                                    </div>
                                </div>
                            </div>

                            ";
            // line 78
            yield "                            <div class=\"col-md-4\">
                                <div class=\"card shadow-sm border-0 contact-tiers-box\">
                                    ";
            // line 80
            $context["tiers"] = (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 80, $this->source); })()), "user", [], "any", false, false, false, 80) == CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "locataire", [], "any", false, false, false, 80))) ? (CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "proprietaire", [], "any", false, false, false, 80)) : (CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "locataire", [], "any", false, false, false, 80)));
            // line 81
            yield "                                    <h6 class=\"fw-bold text-uppercase small mb-3 border-bottom pb-2\">
                                        <i class=\"fas fa-address-book me-2\"></i>Contact ";
            // line 82
            yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 82, $this->source); })()), "user", [], "any", false, false, false, 82) == CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "locataire", [], "any", false, false, false, 82))) ? ("Propriétaire") : ("Locataire"));
            yield "
                                    </h6>
                                    ";
            // line 84
            if ((($tmp = (isset($context["tiers"]) || array_key_exists("tiers", $context) ? $context["tiers"] : (function () { throw new RuntimeError('Variable "tiers" does not exist.', 84, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 85
                yield "                                        <p class=\"mb-2 fw-bold text-dark\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["tiers"]) || array_key_exists("tiers", $context) ? $context["tiers"] : (function () { throw new RuntimeError('Variable "tiers" does not exist.', 85, $this->source); })()), "prenom", [], "any", false, false, false, 85), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["tiers"]) || array_key_exists("tiers", $context) ? $context["tiers"] : (function () { throw new RuntimeError('Variable "tiers" does not exist.', 85, $this->source); })()), "nom", [], "any", false, false, false, 85), "html", null, true);
                yield "</p>
                                        <div class=\"mb-2\">
                                            <small class=\"text-muted d-block\">Téléphone</small>
                                            <a href=\"tel:";
                // line 88
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["tiers"]) || array_key_exists("tiers", $context) ? $context["tiers"] : (function () { throw new RuntimeError('Variable "tiers" does not exist.', 88, $this->source); })()), "telephone", [], "any", false, false, false, 88), "html", null, true);
                yield "\" class=\"text-decoration-none text-dark fw-semibold\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["tiers"] ?? null), "telephone", [], "any", true, true, false, 88)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["tiers"]) || array_key_exists("tiers", $context) ? $context["tiers"] : (function () { throw new RuntimeError('Variable "tiers" does not exist.', 88, $this->source); })()), "telephone", [], "any", false, false, false, 88), "N/C")) : ("N/C")), "html", null, true);
                yield "</a>
                                        </div>
                                        <div>
                                            <small class=\"text-muted d-block\">E-mail</small>
                                            <a href=\"mailto:";
                // line 92
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["tiers"]) || array_key_exists("tiers", $context) ? $context["tiers"] : (function () { throw new RuntimeError('Variable "tiers" does not exist.', 92, $this->source); })()), "email", [], "any", false, false, false, 92), "html", null, true);
                yield "\" class=\"text-decoration-none text-primary small\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["tiers"]) || array_key_exists("tiers", $context) ? $context["tiers"] : (function () { throw new RuntimeError('Variable "tiers" does not exist.', 92, $this->source); })()), "email", [], "any", false, false, false, 92), "html", null, true);
                yield "</a>
                                        </div>
                                    ";
            } else {
                // line 95
                yield "                                        <p class=\"text-muted small italic\">Aucune information tiers disponible.</p>
                                    ";
            }
            // line 97
            yield "                                </div>
                            </div>

                        </div>
                    </div>
                ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['lot'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 103
        yield "            </div>
        </div>
    </div>

    ";
        // line 108
        yield "    <div class=\"row g-4 height-10\">
        
        ";
        // line 111
        yield "        <div class=\"col-lg-4\">
            <div class=\"card shadow-sm border-0 residence-contacts-card h-100\">
                <div class=\"card-header bg-dark text-white py-2\">
                    <h6 class=\"mb-0 small fw-bold\"><i class=\"fas fa-info-circle me-2\"></i>Contacts Utiles</h6>
                </div>
                <div class=\"card-body height-100\">
                    <div class=\"mb-3\">
                        <p class=\"mb-0 fw-bold text-primary small\">Syndic Gestion</p>
                        <p class=\"mb-0 small\"><strong>Tel :</strong> 01 23 45 67 89</p>
                        <p class=\"mb-0 small\"><strong>Mail :</strong> gestion@votre-syndic.com</p>
                    </div>
                    <div class=\"mb-3\">
                        <p class=\"mb-0 fw-bold text-primary small\">Gardiennage</p>
                        <p class=\"mb-0 small\"><strong>Tel :</strong> 06 98 76 54 32</p>
                        <p class=\"mb-0 small\"><strong>Horaires :</strong> 8h-12h / 14h-18h</p>
                    </div>
                    <div>
                        <p class=\"mb-0 fw-bold text-primary small\">Président du Conseil</p>
                        <p class=\"mb-0 small\">M. Jean Dupont</p>
                        <p class=\"mb-0 small text-muted\">Bâtiment B - 4ème étage</p>
                    </div>
                </div>
            </div>
        </div>

        ";
        // line 137
        yield "        <div class=\"col-lg-8\">
            <div class=\"card shadow-sm border-0 border-top border-warning border-4 h-100\">
                <div class=\"card-header bg-white d-flex justify-content-between align-items-center py-3\">
                    <h6 class=\"mb-0 fw-bold text-uppercase small\"><i class=\"fas fa-bullhorn text-warning me-2\"></i>Mes derniers signalements</h6>
                    <a href=\"";
        // line 141
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_incident_new");
        yield "\" class=\"btn btn-warning btn-sm fw-bold shadow-sm\">
                        <i class=\"fas fa-plus-circle me-1\"></i>SIGNALER UN INCIDENT
                    </a>
                </div>
                <div class=\"card-body p-0\">
                    <div class=\"list-group list-group-flush\">
                        ";
        // line 147
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["incidents"]) || array_key_exists("incidents", $context) ? $context["incidents"] : (function () { throw new RuntimeError('Variable "incidents" does not exist.', 147, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["incident"]) {
            // line 148
            yield "                            <div class=\"list-group-item d-flex justify-content-between align-items-center p-3\">
                                <div>
                                    <h6 class=\"mb-0 fw-bold small\">";
            // line 150
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["incident"], "titre", [], "any", false, false, false, 150), "html", null, true);
            yield "</h6>
                                    <small class=\"text-muted\">Déclaré le ";
            // line 151
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["incident"], "dateCreation", [], "any", false, false, false, 151), "d/m/Y"), "html", null, true);
            yield "</small>
                                </div>
                                <span class=\"badge bg-info text-dark\">";
            // line 153
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["incident"], "statut", [], "any", false, false, false, 153), "html", null, true);
            yield "</span>
                            </div>
                        ";
            $context['_iterated'] = true;
        }
        // line 155
        if (!$context['_iterated']) {
            // line 156
            yield "                            <div class=\"p-5 text-center text-muted small italic\">
                                <i class=\"fas fa-check-circle fa-2x mb-2 text-light\"></i>
                                <p class=\"mb-0\">Tout est en ordre ! Aucun incident signalé.</p>
                            </div>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['incident'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 161
        yield "                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "resident/index10.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  425 => 161,  415 => 156,  413 => 155,  406 => 153,  401 => 151,  397 => 150,  393 => 148,  388 => 147,  379 => 141,  373 => 137,  346 => 111,  342 => 108,  336 => 103,  317 => 97,  313 => 95,  305 => 92,  296 => 88,  287 => 85,  285 => 84,  280 => 82,  277 => 81,  275 => 80,  271 => 78,  265 => 73,  258 => 71,  256 => 70,  247 => 68,  243 => 67,  239 => 65,  234 => 64,  230 => 62,  224 => 58,  220 => 57,  216 => 56,  213 => 55,  206 => 50,  201 => 49,  199 => 48,  195 => 47,  190 => 44,  181 => 40,  164 => 39,  160 => 37,  154 => 32,  137 => 29,  132 => 27,  128 => 26,  121 => 24,  116 => 23,  99 => 22,  93 => 19,  88 => 16,  84 => 13,  76 => 6,  63 => 5,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}



{% block body %}
<div class=\"container-fluid px-4\">
    
    <div class=\"d-flex justify-content-center align-items-center mb-4\">
        <h2 class=\"h4 fw-bold text-dark m-4\"><i class=\"fas fa-desktop me-2 text-primary\"></i>Tableau de bord Résident</h2>
    </div>

    {# --- LIGNE 1 : BIENS ET DÉTAILS --- #}
    <div class=\"row g-4 mb-4\">
        
        {# GAUCHE : LISTE DES BIENS (SCROLLABLE) #}
        <div class=\"col-md-4\">
            <div class=\"card shadow-sm border-0\">
                <div class=\"card-header bg-primary text-white py-3\">
                    <h6 class=\"mb-0 fw-bold\"><i class=\"fas fa-list me-2\"></i>Mes Biens ({{ lots|length }})</h6>
                </div>
                <div class=\"list-group list-group-flush sidebar-lots\" id=\"list-tab\" role=\"tablist\">
                    {% for lot in lots %}
                        <a class=\"list-group-item list-group-item-action {{ loop.first ? 'active' : '' }} p-3\" 
                           id=\"tab-{{ lot.id }}-list\" data-bs-toggle=\"list\" href=\"#tab-{{ lot.id }}\" role=\"tab\">
                            <div class=\"d-flex justify-content-between align-items-center\">
                                <strong class=\"text-uppercase\">Lot {{ lot.numeroLot }}</strong>
                                <span class=\"badge bg-light text-dark border small\">{{ lot.type }}</span>
                            </div>
                            <small class=\"text-muted\">{{ lot.batiment.nom }}</small>
                        </a>
                    {% endfor %}
                </div>
            </div>
        </div>

        {# DROITE : FICHE DÉTAILLÉE (70/30) #}
        <div class=\"col-lg-8 col-md-4\">
            <div class=\"tab-content\" id=\"nav-tabContent\">
                {% for lot in lots %}
                    <div class=\"tab-pane fade {{ loop.first ? 'show active' : '' }}\" id=\"tab-{{ lot.id }}\" role=\"tabpanel\">
                        <div class=\"row g-3\">
                            
                            {# LA FICHE DU LOT (70%) #}
                            <div class=\"col-md-8 \">
                                <div class=\"card shadow-sm border-0 lot-main-box p-4 justify-content-between align-items-center\">
                                    <div class=\"d-flex justify-content-between align-items-center \">
                                        <h3 class=\"h4 fw-bold mb-0 mx-4\">Fiche du Lot {{ lot.numeroLot }}</h3>
                                        {% set is_proprio = (app.user == lot.proprietaire) %}
                                        <span class=\"badge {{ is_proprio ? 'bg-primary' : 'bg-success' }} px-3 py-2 rounded-pill\">
                                            {{ is_proprio ? 'PROPRIÉTAIRE' : 'LOCATAIRE' }}
                                        </span>
                                    </div>

                                    {# Localisation #}
                                    <div class=\"row bg-light rounded py-3 mb-4 border mx-0 text-center\">
                                        <div class=\"col-4 border-end\"><small class=\"text-muted d-block small\">Bâtiment</small><strong>{{ lot.batiment.nom }}</strong></div>
                                        <div class=\"col-4 border-end\"><small class=\"text-muted d-block small\">Étage</small><strong>{{ lot.etage }}</strong></div>
                                        <div class=\"col-4\"><small class=\"text-muted d-block small\">Position</small><strong>{{ lot.position|default('N/C') }}</strong></div>
                                    </div>

                                    {# Badges #}
                                    <h6 class=\"fw-bold mb-3 small text-uppercase text-muted\">Badges d'accès liés</h6>
                                    <div class=\"d-flex flex-wrap gap-2\">
                                        {% for badge in lot.badges %}
                                            <div class=\"badge-item\">
                                                <i class=\"fas fa-key me-2 text-warning\"></i>
                                                <code class=\"me-2 text-dark fw-bold\">{{ badge.numeroHexa }}</code>
                                                <span class=\"badge bg-{{ badge.status|lower == 'actif' ? 'success' : 'danger' }} small\" style=\"font-size: 0.6rem;\">{{ badge.status|upper }}</span>
                                            </div>
                                        {% else %}
                                            <p class=\"text-muted small\">Aucun badge enregistré.</p>
                                        {% endfor %}
                                    </div>
                                </div>
                            </div>

                            {# COORDONNÉES TIERS (30%) #}
                            <div class=\"col-md-4\">
                                <div class=\"card shadow-sm border-0 contact-tiers-box\">
                                    {% set tiers = (app.user == lot.locataire) ? lot.proprietaire : lot.locataire %}
                                    <h6 class=\"fw-bold text-uppercase small mb-3 border-bottom pb-2\">
                                        <i class=\"fas fa-address-book me-2\"></i>Contact {{ app.user == lot.locataire ? 'Propriétaire' : 'Locataire' }}
                                    </h6>
                                    {% if tiers %}
                                        <p class=\"mb-2 fw-bold text-dark\">{{ tiers.prenom }} {{ tiers.nom }}</p>
                                        <div class=\"mb-2\">
                                            <small class=\"text-muted d-block\">Téléphone</small>
                                            <a href=\"tel:{{ tiers.telephone }}\" class=\"text-decoration-none text-dark fw-semibold\">{{ tiers.telephone|default('N/C') }}</a>
                                        </div>
                                        <div>
                                            <small class=\"text-muted d-block\">E-mail</small>
                                            <a href=\"mailto:{{ tiers.email }}\" class=\"text-decoration-none text-primary small\">{{ tiers.email }}</a>
                                        </div>
                                    {% else %}
                                        <p class=\"text-muted small italic\">Aucune information tiers disponible.</p>
                                    {% endif %}
                                </div>
                            </div>

                        </div>
                    </div>
                {% endfor %}
            </div>
        </div>
    </div>

    {# --- LIGNE 2 : CONTACTS RÉSIDENCE ET SIGNALEMENTS --- #}
    <div class=\"row g-4 height-10\">
        
        {# BAS GAUCHE : CONTACTS RÉSIDENCE (Aligné sur la sidebar) #}
        <div class=\"col-lg-4\">
            <div class=\"card shadow-sm border-0 residence-contacts-card h-100\">
                <div class=\"card-header bg-dark text-white py-2\">
                    <h6 class=\"mb-0 small fw-bold\"><i class=\"fas fa-info-circle me-2\"></i>Contacts Utiles</h6>
                </div>
                <div class=\"card-body height-100\">
                    <div class=\"mb-3\">
                        <p class=\"mb-0 fw-bold text-primary small\">Syndic Gestion</p>
                        <p class=\"mb-0 small\"><strong>Tel :</strong> 01 23 45 67 89</p>
                        <p class=\"mb-0 small\"><strong>Mail :</strong> gestion@votre-syndic.com</p>
                    </div>
                    <div class=\"mb-3\">
                        <p class=\"mb-0 fw-bold text-primary small\">Gardiennage</p>
                        <p class=\"mb-0 small\"><strong>Tel :</strong> 06 98 76 54 32</p>
                        <p class=\"mb-0 small\"><strong>Horaires :</strong> 8h-12h / 14h-18h</p>
                    </div>
                    <div>
                        <p class=\"mb-0 fw-bold text-primary small\">Président du Conseil</p>
                        <p class=\"mb-0 small\">M. Jean Dupont</p>
                        <p class=\"mb-0 small text-muted\">Bâtiment B - 4ème étage</p>
                    </div>
                </div>
            </div>
        </div>

        {# BAS DROITE : SIGNALEMENTS (Aligné sur la fiche lot) #}
        <div class=\"col-lg-8\">
            <div class=\"card shadow-sm border-0 border-top border-warning border-4 h-100\">
                <div class=\"card-header bg-white d-flex justify-content-between align-items-center py-3\">
                    <h6 class=\"mb-0 fw-bold text-uppercase small\"><i class=\"fas fa-bullhorn text-warning me-2\"></i>Mes derniers signalements</h6>
                    <a href=\"{{ path('app_incident_new') }}\" class=\"btn btn-warning btn-sm fw-bold shadow-sm\">
                        <i class=\"fas fa-plus-circle me-1\"></i>SIGNALER UN INCIDENT
                    </a>
                </div>
                <div class=\"card-body p-0\">
                    <div class=\"list-group list-group-flush\">
                        {% for incident in incidents %}
                            <div class=\"list-group-item d-flex justify-content-between align-items-center p-3\">
                                <div>
                                    <h6 class=\"mb-0 fw-bold small\">{{ incident.titre }}</h6>
                                    <small class=\"text-muted\">Déclaré le {{ incident.dateCreation|date('d/m/Y') }}</small>
                                </div>
                                <span class=\"badge bg-info text-dark\">{{ incident.statut }}</span>
                            </div>
                        {% else %}
                            <div class=\"p-5 text-center text-muted small italic\">
                                <i class=\"fas fa-check-circle fa-2x mb-2 text-light\"></i>
                                <p class=\"mb-0\">Tout est en ordre ! Aucun incident signalé.</p>
                            </div>
                        {% endfor %}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
{% endblock %}", "resident/index10.html.twig", "C:\\laragon\\www\\syndicopro2\\templates\\resident\\index10.html.twig");
    }
}
