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

/* resident/index.html.twig */
class __TwigTemplate_5e2cfbf4575bcf884ffa5c7c599ba3df extends Template
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
            'stylesheets' => [$this, 'block_stylesheets'],
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "resident/index.html.twig"));

        $this->parent = $this->load("base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 4
        yield from $this->yieldParentBlock("stylesheets", $context, $blocks);
        yield "
<link rel=\"stylesheet\" href=\"";
        // line 5
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/resident.css"), "html", null, true);
        yield "\">
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 8
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 9
        yield "<div class=\"container-fluid py-3\">

    ";
        // line 12
        yield "    ";
        // line 13
        yield "    ";
        // line 14
        yield "    <div class=\"d-flex flex-column flex-md-row justify-content-between align-items-center mb-4 gap-2\">
        <h2 class=\"h4 fw-bold text-dark mb-0 text-center\">
            <i class=\"fas fa-desktop me-2 text-primary\"></i>Tableau de bord Résident
        </h2>

        <button class=\"btn btn-outline-primary btn-sm d-md-none\" type=\"button\" data-bs-toggle=\"collapse\"
            data-bs-target=\"#sidebarLots\">
            <i class=\"fas fa-bars me-1\"></i>Mes Biens (";
        // line 21
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["lots"]) || array_key_exists("lots", $context) ? $context["lots"] : (function () { throw new RuntimeError('Variable "lots" does not exist.', 21, $this->source); })())), "html", null, true);
        yield ")
        </button>
    </div>

    <div class=\"row g-4\">

        ";
        // line 28
        yield "        ";
        // line 29
        yield "        ";
        // line 30
        yield "        <div class=\"col-12 col-md-4 col-lg-3\">
            <div class=\"collapse d-md-block\" id=\"sidebarLots\">
                <div class=\"card shadow-sm border-0 h-100\">
                    <div class=\"card-header bg-primary text-white py-3\">
                        <h6 class=\"mb-0 fw-bold\">
                            <i class=\"fas fa-list me-2\"></i>Mes Biens (";
        // line 35
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["lots"]) || array_key_exists("lots", $context) ? $context["lots"] : (function () { throw new RuntimeError('Variable "lots" does not exist.', 35, $this->source); })())), "html", null, true);
        yield ")
                        </h6>
                    </div>

                    <div class=\"list-group list-group-flush overflow-auto\" style=\"max-height: calc(100vh - 250px);\">

                        ";
        // line 41
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["lots"]) || array_key_exists("lots", $context) ? $context["lots"] : (function () { throw new RuntimeError('Variable "lots" does not exist.', 41, $this->source); })()));
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
            // line 42
            yield "                        <a href=\"#tab-";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "id", [], "any", false, false, false, 42), "html", null, true);
            yield "\"
                            class=\"list-group-item list-group-item-action py-3 ";
            // line 43
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 43)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("active") : (""));
            yield "\"
                            data-bs-toggle=\"list\">
                            <div class=\"d-flex justify-content-between\">
                                <div>
                                    <strong class=\"text-uppercase small\">Lot ";
            // line 47
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "numeroLot", [], "any", false, false, false, 47), "html", null, true);
            yield "</strong><br>
                                    <small class=\"text-muted\">";
            // line 48
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "batiment", [], "any", false, false, false, 48), "nom", [], "any", false, false, false, 48), "html", null, true);
            yield "</small>
                                </div>
                                <span class=\"badge bg-light text-dark border rounded-pill small\">
                                    ";
            // line 51
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 51), "html", null, true);
            yield "
                                </span>
                            </div>
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
        // line 56
        yield "
                    </div>
                </div>
            </div>
        </div>

        ";
        // line 63
        yield "        ";
        // line 64
        yield "        ";
        // line 65
        yield "        <div class=\"col-12 col-md-8 col-lg-9\">

            <div class=\"tab-content\">

                ";
        // line 69
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["lots"]) || array_key_exists("lots", $context) ? $context["lots"] : (function () { throw new RuntimeError('Variable "lots" does not exist.', 69, $this->source); })()));
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
            // line 70
            yield "                <div class=\"tab-pane fade ";
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 70)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("show active") : (""));
            yield "\" id=\"tab-";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "id", [], "any", false, false, false, 70), "html", null, true);
            yield "\">

                    <div class=\"row g-4\">

                        ";
            // line 75
            yield "                        <div class=\"col-12\">
                            <div class=\"card shadow-sm border-0\">
                                <div class=\"card-body p-4\">

                                    <div class=\"d-flex justify-content-between align-items-center mb-3\">
                                        <h3 class=\"h4 fw-bold text-dark\">Fiche du Lot ";
            // line 80
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "numeroLot", [], "any", false, false, false, 80), "html", null, true);
            yield "</h3>

                                        ";
            // line 82
            $context["is_proprio"] = (CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 82, $this->source); })()), "user", [], "any", false, false, false, 82) == CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "proprietaire", [], "any", false, false, false, 82));
            // line 83
            yield "                                        <span class=\"badge bg-light border rounded-pill px-2 py-1 small\">
                                            ";
            // line 84
            yield (((($tmp = (isset($context["is_proprio"]) || array_key_exists("is_proprio", $context) ? $context["is_proprio"] : (function () { throw new RuntimeError('Variable "is_proprio" does not exist.', 84, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Propriétaire") : ("Locataire"));
            yield "
                                        </span>
                                    </div>

                                    <div class=\"row g-3 mb-4 bg-light rounded p-3 border-bottom\">
                                        <div class=\"col-auto\">
                                            <small class=\"text-muted d-block\">Bâtiment</small>
                                            <strong>";
            // line 91
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "batiment", [], "any", false, false, false, 91), "nom", [], "any", false, false, false, 91), "html", null, true);
            yield "</strong>
                                        </div>
                                        <div class=\"col-auto\">
                                            <small class=\"text-muted d-block\">Étage</small>
                                            <strong>";
            // line 95
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "etage", [], "any", false, false, false, 95), "html", null, true);
            yield "</strong>
                                        </div>
                                        <div class=\"col-auto flex-grow-1\">
                                            <small class=\"text-muted d-block\">Position</small>
                                            <strong>";
            // line 99
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "position", [], "any", true, true, false, 99)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "position", [], "any", false, false, false, 99), "N/C")) : ("N/C")), "html", null, true);
            yield "</strong>
                                        </div>
                                    </div>

                                    ";
            // line 104
            yield "                                    <div class=\"container-badges\">
                                        <h6 class=\"section-title\">Badges d'accès</h6>

                                        <div class=\"d-flex flex-wrap gap-3\">
                                            ";
            // line 108
            $context["badgesActifs"] = Twig\Extension\CoreExtension::filter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "badges", [], "any", false, false, false, 108), function ($__b__) use ($context, $macros) { $context["b"] = $__b__; return (Twig\Extension\CoreExtension::lower($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["b"]) || array_key_exists("b", $context) ? $context["b"] : (function () { throw new RuntimeError('Variable "b" does not exist.', 108, $this->source); })()), "status", [], "any", false, false, false, 108)) == "actif"); });
            // line 109
            yield "
                                            ";
            // line 110
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["badgesActifs"]) || array_key_exists("badgesActifs", $context) ? $context["badgesActifs"] : (function () { throw new RuntimeError('Variable "badgesActifs" does not exist.', 110, $this->source); })()));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["_key"] => $context["badge"]) {
                // line 111
                yield "                                            <span
                                                class=\"badge bg-light border rounded-pill px-2 py-1 small d-flex align-items-center\"
                                                style=\"gap: 0.5rem;\">
                                                <i class=\"fas fa-key text-warning\"></i>
                                                <code>";
                // line 115
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["badge"], "numeroHexa", [], "any", false, false, false, 115), "html", null, true);
                yield "</code>
                                                <span class=\"badge bg-success small py-1 rounded-pill\">
                                                    ";
                // line 117
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["badge"], "status", [], "any", false, false, false, 117)), "html", null, true);
                yield "
                                                </span>
                                            </span>
                                            ";
                $context['_iterated'] = true;
            }
            // line 120
            if (!$context['_iterated']) {
                // line 121
                yield "                                            <p class=\"text-muted small\">Aucun badge actif.</p>
                                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['badge'], $context['_parent'], $context['_iterated']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 123
            yield "                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        ";
            // line 131
            yield "                        <div class=\"col-12\">
                            <div class=\"card shadow-sm border-0 contact-tiers\">
                                <div class=\"card-body p-4\">

                                    ";
            // line 135
            $context["tiers"] = (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 135, $this->source); })()), "user", [], "any", false, false, false, 135) == CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "locataire", [], "any", false, false, false, 135))) ? (CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "proprietaire", [], "any", false, false, false, 135)) : (CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "locataire", [], "any", false, false, false, 135)));
            // line 136
            yield "
                                    <h6 class=\"section-title\">
                                        Contact ";
            // line 138
            yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 138, $this->source); })()), "user", [], "any", false, false, false, 138) == CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "locataire", [], "any", false, false, false, 138))) ? ("Propriétaire") : ("Locataire"));
            yield "
                                    </h6>

                                    ";
            // line 141
            if ((($tmp = (isset($context["tiers"]) || array_key_exists("tiers", $context) ? $context["tiers"] : (function () { throw new RuntimeError('Variable "tiers" does not exist.', 141, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 142
                yield "                                    <p class=\"mb-2 fw-semibold fs-5\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["tiers"]) || array_key_exists("tiers", $context) ? $context["tiers"] : (function () { throw new RuntimeError('Variable "tiers" does not exist.', 142, $this->source); })()), "prenom", [], "any", false, false, false, 142), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["tiers"]) || array_key_exists("tiers", $context) ? $context["tiers"] : (function () { throw new RuntimeError('Variable "tiers" does not exist.', 142, $this->source); })()), "nom", [], "any", false, false, false, 142), "html", null, true);
                yield "</p>

                                    <div class=\"d-flex flex-column gap-3\">
                                        <a href=\"tel:";
                // line 145
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["tiers"]) || array_key_exists("tiers", $context) ? $context["tiers"] : (function () { throw new RuntimeError('Variable "tiers" does not exist.', 145, $this->source); })()), "telephone", [], "any", false, false, false, 145), "html", null, true);
                yield "\" class=\"text-dark d-flex align-items-center\">
                                            <i class=\"fas fa-phone-alt me-2\"></i>
                                            ";
                // line 147
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["tiers"] ?? null), "telephone", [], "any", true, true, false, 147)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["tiers"]) || array_key_exists("tiers", $context) ? $context["tiers"] : (function () { throw new RuntimeError('Variable "tiers" does not exist.', 147, $this->source); })()), "telephone", [], "any", false, false, false, 147), "N/C")) : ("N/C")), "html", null, true);
                yield "
                                        </a>

                                        <a href=\"mailto:";
                // line 150
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["tiers"]) || array_key_exists("tiers", $context) ? $context["tiers"] : (function () { throw new RuntimeError('Variable "tiers" does not exist.', 150, $this->source); })()), "email", [], "any", false, false, false, 150), "html", null, true);
                yield "\" class=\"text-dark d-flex align-items-center\">
                                            <i class=\"fas fa-envelope me-2\"></i>
                                            ";
                // line 152
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["tiers"]) || array_key_exists("tiers", $context) ? $context["tiers"] : (function () { throw new RuntimeError('Variable "tiers" does not exist.', 152, $this->source); })()), "email", [], "any", false, false, false, 152), "html", null, true);
                yield "
                                        </a>
                                    </div>

                                    ";
            } else {
                // line 157
                yield "                                    <p class=\"text-muted small\">Aucune information disponible.</p>
                                    ";
            }
            // line 159
            yield "
                                </div>
                            </div>
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
        // line 168
        yield "
            </div>

        </div>
    </div>

    ";
        // line 175
        yield "    ";
        // line 176
        yield "    ";
        // line 177
        yield "    <div class=\"row mt-4\">
        <div class=\"col-12 col-lg-9 mx-auto\">

            ";
        // line 181
        yield "            <div class=\"card shadow-sm border-0 mb-4\">
                <div class=\"card-header bg-dark text-white py-3\">
                    <h6 class=\"mb-0 small fw-bold\">
                        <i class=\"fas fa-info-circle me-2\"></i>Contacts Utiles
                    </h6>
                </div>

                <div class=\"card-body p-4 row g-3\">
                    <div class=\"col-sm-6 col-md-4\">
                        <p class=\"fw-bold text-primary mb-1\">Syndic Gestion</p>
                        <small><strong>Tel :</strong> 01 23 45 67 89</small><br>
                        <small><strong>Email :</strong> gestion@votre-syndic.com</small>
                    </div>

                    <div class=\"col-sm-6 col-md-4\">
                        <p class=\"fw-bold text-primary mb-1\">Gardiennage</p>
                        <small><strong>Tel :</strong> 06 98 76 54 32</small><br>
                        <small><strong>Horaires :</strong> 8h-12h / 14h-18h</small>
                    </div>

                    <div class=\"col-md-4\">
                        <p class=\"fw-bold text-primary mb-1\">Président du Conseil</p>
                        <small>M. Jean Dupont<br>Bâtiment B - 4ème étage</small>
                    </div>
                </div>
            </div>

            ";
        // line 209
        yield "            <div class=\"card shadow-sm border-0 mb-5\">
                <!-- <div class=\"card-header bg-white py-3 border-bottom\">
                    <h6 class=\"fw-bold text-uppercase small\">
                        <i class=\"fas fa-bullhorn text-warning me-2\"></i>Mes derniers signalements
                    </h6>
                </div> -->
                <div class=\"card-header bg-white d-flex justify-content-between align-items-center py-3\"
                    style=\"border-bottom: 2px solid #f8d7da;\">

                    <h6 class=\"fw-bold text-uppercase small mb-0\">
                        <i class=\"fas fa-bullhorn text-warning me-1\"></i>
                        Mes derniers signalements
                    </h6>

                    <a href=\"";
        // line 223
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_incident_new");
        yield "\" class=\"btn btn-sm fw-semibold shadow-sm\"
                        style=\"background-color: #ffc107; color:#212529;\">
                        <i class=\"fas fa-plus-circle me-1\"></i>
                        SIGNALER
                    </a>

                </div>


                <ul class=\"list-group list-group-flush\">
                    ";
        // line 233
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["incidents"]) || array_key_exists("incidents", $context) ? $context["incidents"] : (function () { throw new RuntimeError('Variable "incidents" does not exist.', 233, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["incident"]) {
            // line 234
            yield "                    <li class=\"list-group-item d-flex justify-content-between align-items-center py-3\">
                        <span>
                            <strong>";
            // line 236
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["incident"], "titre", [], "any", false, false, false, 236), "html", null, true);
            yield "</strong> — Déclaré le ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["incident"], "dateCreation", [], "any", false, false, false, 236), "d/m/Y"), "html", null, true);
            yield "
                        </span>
                        <span class=\"badge bg-info text-dark rounded-pill small\">
                            ";
            // line 239
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["incident"], "statut", [], "any", false, false, false, 239), "html", null, true);
            yield "
                        </span>
                    </li>
                    ";
            $context['_iterated'] = true;
        }
        // line 242
        if (!$context['_iterated']) {
            // line 243
            yield "                    <div class=\"p-5 text-center text-muted\">
                        <i class=\"fas fa-check-circle fa-3x mb-3 text-success\"></i><br>
                        Tout est en ordre ! Aucun incident signalé.
                    </div>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['incident'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 248
        yield "                </ul>
            </div>


        </div>
    </div>

</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "resident/index.html.twig";
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
        return array (  533 => 248,  523 => 243,  521 => 242,  513 => 239,  505 => 236,  501 => 234,  496 => 233,  483 => 223,  467 => 209,  438 => 181,  433 => 177,  431 => 176,  429 => 175,  421 => 168,  399 => 159,  395 => 157,  387 => 152,  382 => 150,  376 => 147,  371 => 145,  362 => 142,  360 => 141,  354 => 138,  350 => 136,  348 => 135,  342 => 131,  333 => 123,  326 => 121,  324 => 120,  316 => 117,  311 => 115,  305 => 111,  300 => 110,  297 => 109,  295 => 108,  289 => 104,  282 => 99,  275 => 95,  268 => 91,  258 => 84,  255 => 83,  253 => 82,  248 => 80,  241 => 75,  231 => 70,  214 => 69,  208 => 65,  206 => 64,  204 => 63,  196 => 56,  177 => 51,  171 => 48,  167 => 47,  160 => 43,  155 => 42,  138 => 41,  129 => 35,  122 => 30,  120 => 29,  118 => 28,  109 => 21,  100 => 14,  98 => 13,  96 => 12,  92 => 9,  82 => 8,  72 => 5,  68 => 4,  58 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block stylesheets %}
{{ parent() }}
<link rel=\"stylesheet\" href=\"{{ asset('build/resident.css') }}\">
{% endblock %}

{% block body %}
<div class=\"container-fluid py-3\">

    {# ──────────────────────────────── #}
    {# EN-TÊTE #}
    {# ──────────────────────────────── #}
    <div class=\"d-flex flex-column flex-md-row justify-content-between align-items-center mb-4 gap-2\">
        <h2 class=\"h4 fw-bold text-dark mb-0 text-center\">
            <i class=\"fas fa-desktop me-2 text-primary\"></i>Tableau de bord Résident
        </h2>

        <button class=\"btn btn-outline-primary btn-sm d-md-none\" type=\"button\" data-bs-toggle=\"collapse\"
            data-bs-target=\"#sidebarLots\">
            <i class=\"fas fa-bars me-1\"></i>Mes Biens ({{ lots|length }})
        </button>
    </div>

    <div class=\"row g-4\">

        {# ──────────────────────────────── #}
        {# SIDEBAR #}
        {# ──────────────────────────────── #}
        <div class=\"col-12 col-md-4 col-lg-3\">
            <div class=\"collapse d-md-block\" id=\"sidebarLots\">
                <div class=\"card shadow-sm border-0 h-100\">
                    <div class=\"card-header bg-primary text-white py-3\">
                        <h6 class=\"mb-0 fw-bold\">
                            <i class=\"fas fa-list me-2\"></i>Mes Biens ({{ lots|length }})
                        </h6>
                    </div>

                    <div class=\"list-group list-group-flush overflow-auto\" style=\"max-height: calc(100vh - 250px);\">

                        {% for lot in lots %}
                        <a href=\"#tab-{{ lot.id }}\"
                            class=\"list-group-item list-group-item-action py-3 {{ loop.first ? 'active' : '' }}\"
                            data-bs-toggle=\"list\">
                            <div class=\"d-flex justify-content-between\">
                                <div>
                                    <strong class=\"text-uppercase small\">Lot {{ lot.numeroLot }}</strong><br>
                                    <small class=\"text-muted\">{{ lot.batiment.nom }}</small>
                                </div>
                                <span class=\"badge bg-light text-dark border rounded-pill small\">
                                    {{ loop.index }}
                                </span>
                            </div>
                        </a>
                        {% endfor %}

                    </div>
                </div>
            </div>
        </div>

        {# ──────────────────────────────── #}
        {# CONTENU PRINCIPAL #}
        {# ──────────────────────────────── #}
        <div class=\"col-12 col-md-8 col-lg-9\">

            <div class=\"tab-content\">

                {% for lot in lots %}
                <div class=\"tab-pane fade {{ loop.first ? 'show active' : '' }}\" id=\"tab-{{ lot.id }}\">

                    <div class=\"row g-4\">

                        {# ─────────────── FICHE LOT ─────────────── #}
                        <div class=\"col-12\">
                            <div class=\"card shadow-sm border-0\">
                                <div class=\"card-body p-4\">

                                    <div class=\"d-flex justify-content-between align-items-center mb-3\">
                                        <h3 class=\"h4 fw-bold text-dark\">Fiche du Lot {{ lot.numeroLot }}</h3>

                                        {% set is_proprio = (app.user == lot.proprietaire) %}
                                        <span class=\"badge bg-light border rounded-pill px-2 py-1 small\">
                                            {{ is_proprio ? 'Propriétaire' : 'Locataire' }}
                                        </span>
                                    </div>

                                    <div class=\"row g-3 mb-4 bg-light rounded p-3 border-bottom\">
                                        <div class=\"col-auto\">
                                            <small class=\"text-muted d-block\">Bâtiment</small>
                                            <strong>{{ lot.batiment.nom }}</strong>
                                        </div>
                                        <div class=\"col-auto\">
                                            <small class=\"text-muted d-block\">Étage</small>
                                            <strong>{{ lot.etage }}</strong>
                                        </div>
                                        <div class=\"col-auto flex-grow-1\">
                                            <small class=\"text-muted d-block\">Position</small>
                                            <strong>{{ lot.position|default('N/C') }}</strong>
                                        </div>
                                    </div>

                                    {# BADGES #}
                                    <div class=\"container-badges\">
                                        <h6 class=\"section-title\">Badges d'accès</h6>

                                        <div class=\"d-flex flex-wrap gap-3\">
                                            {% set badgesActifs = lot.badges|filter(b => b.status|lower == 'actif') %}

                                            {% for badge in badgesActifs %}
                                            <span
                                                class=\"badge bg-light border rounded-pill px-2 py-1 small d-flex align-items-center\"
                                                style=\"gap: 0.5rem;\">
                                                <i class=\"fas fa-key text-warning\"></i>
                                                <code>{{ badge.numeroHexa }}</code>
                                                <span class=\"badge bg-success small py-1 rounded-pill\">
                                                    {{ badge.status|upper }}
                                                </span>
                                            </span>
                                            {% else %}
                                            <p class=\"text-muted small\">Aucun badge actif.</p>
                                            {% endfor %}
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        {# ─────────────── CONTACT TIERS ─────────────── #}
                        <div class=\"col-12\">
                            <div class=\"card shadow-sm border-0 contact-tiers\">
                                <div class=\"card-body p-4\">

                                    {% set tiers = (app.user == lot.locataire) ? lot.proprietaire : lot.locataire %}

                                    <h6 class=\"section-title\">
                                        Contact {{ app.user == lot.locataire ? 'Propriétaire' : 'Locataire' }}
                                    </h6>

                                    {% if tiers %}
                                    <p class=\"mb-2 fw-semibold fs-5\">{{ tiers.prenom }} {{ tiers.nom }}</p>

                                    <div class=\"d-flex flex-column gap-3\">
                                        <a href=\"tel:{{ tiers.telephone }}\" class=\"text-dark d-flex align-items-center\">
                                            <i class=\"fas fa-phone-alt me-2\"></i>
                                            {{ tiers.telephone|default('N/C') }}
                                        </a>

                                        <a href=\"mailto:{{ tiers.email }}\" class=\"text-dark d-flex align-items-center\">
                                            <i class=\"fas fa-envelope me-2\"></i>
                                            {{ tiers.email }}
                                        </a>
                                    </div>

                                    {% else %}
                                    <p class=\"text-muted small\">Aucune information disponible.</p>
                                    {% endif %}

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                {% endfor %}

            </div>

        </div>
    </div>

    {# ──────────────────────────────── #}
    {# CONTACTS UTILES + SIGNALEMENTS #}
    {# ──────────────────────────────── #}
    <div class=\"row mt-4\">
        <div class=\"col-12 col-lg-9 mx-auto\">

            {# CONTACTS UTILES #}
            <div class=\"card shadow-sm border-0 mb-4\">
                <div class=\"card-header bg-dark text-white py-3\">
                    <h6 class=\"mb-0 small fw-bold\">
                        <i class=\"fas fa-info-circle me-2\"></i>Contacts Utiles
                    </h6>
                </div>

                <div class=\"card-body p-4 row g-3\">
                    <div class=\"col-sm-6 col-md-4\">
                        <p class=\"fw-bold text-primary mb-1\">Syndic Gestion</p>
                        <small><strong>Tel :</strong> 01 23 45 67 89</small><br>
                        <small><strong>Email :</strong> gestion@votre-syndic.com</small>
                    </div>

                    <div class=\"col-sm-6 col-md-4\">
                        <p class=\"fw-bold text-primary mb-1\">Gardiennage</p>
                        <small><strong>Tel :</strong> 06 98 76 54 32</small><br>
                        <small><strong>Horaires :</strong> 8h-12h / 14h-18h</small>
                    </div>

                    <div class=\"col-md-4\">
                        <p class=\"fw-bold text-primary mb-1\">Président du Conseil</p>
                        <small>M. Jean Dupont<br>Bâtiment B - 4ème étage</small>
                    </div>
                </div>
            </div>

            {# SIGNALEMENTS #}
            <div class=\"card shadow-sm border-0 mb-5\">
                <!-- <div class=\"card-header bg-white py-3 border-bottom\">
                    <h6 class=\"fw-bold text-uppercase small\">
                        <i class=\"fas fa-bullhorn text-warning me-2\"></i>Mes derniers signalements
                    </h6>
                </div> -->
                <div class=\"card-header bg-white d-flex justify-content-between align-items-center py-3\"
                    style=\"border-bottom: 2px solid #f8d7da;\">

                    <h6 class=\"fw-bold text-uppercase small mb-0\">
                        <i class=\"fas fa-bullhorn text-warning me-1\"></i>
                        Mes derniers signalements
                    </h6>

                    <a href=\"{{ path('app_incident_new') }}\" class=\"btn btn-sm fw-semibold shadow-sm\"
                        style=\"background-color: #ffc107; color:#212529;\">
                        <i class=\"fas fa-plus-circle me-1\"></i>
                        SIGNALER
                    </a>

                </div>


                <ul class=\"list-group list-group-flush\">
                    {% for incident in incidents %}
                    <li class=\"list-group-item d-flex justify-content-between align-items-center py-3\">
                        <span>
                            <strong>{{ incident.titre }}</strong> — Déclaré le {{ incident.dateCreation|date('d/m/Y') }}
                        </span>
                        <span class=\"badge bg-info text-dark rounded-pill small\">
                            {{ incident.statut }}
                        </span>
                    </li>
                    {% else %}
                    <div class=\"p-5 text-center text-muted\">
                        <i class=\"fas fa-check-circle fa-3x mb-3 text-success\"></i><br>
                        Tout est en ordre ! Aucun incident signalé.
                    </div>
                    {% endfor %}
                </ul>
            </div>


        </div>
    </div>

</div>
{% endblock %}", "resident/index.html.twig", "/home/u607724417/domains/syndicopro.lamaisonducode.fr/public_html/templates/resident/index.html.twig");
    }
}
