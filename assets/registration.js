// On exporte une fonction pour pouvoir l'appeler si besoin, 
// ou on laisse le code s'exécuter au chargement
export function initRegistration() {
    const coproRadios = document.querySelectorAll('input[name="registration_form[copropriete]"]');
    const batimentSelect = document.querySelector('#registration_form_batiment');

    if (coproRadios.length > 0 && batimentSelect) {
        coproRadios.forEach((radio) => {
            radio.addEventListener('change', function() {
                const coproId = this.value;

                batimentSelect.innerHTML = '<option>Chargement...</option>';

                fetch('/get-batiments/' + coproId)
                    .then(response => response.json())
                    .then(data => {
                        batimentSelect.innerHTML = '<option value="">-- Sélectionnez votre bâtiment --</option>';
                        data.forEach(batiment => {
                            let option = document.createElement('option');
                            option.value = batiment.id;
                            option.text = batiment.nom;
                            batimentSelect.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Erreur:', error));
            });
        });
    }
}

// On l'exécute automatiquement
initRegistration();