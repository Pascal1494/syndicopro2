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

/* resident/index11.html.twig */
class __TwigTemplate_07749e60db1d21d075ccbfd0abe6ab1c extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "resident/index11.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "resident/index11.html.twig"));

        $this->parent = $this->load("base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
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

        // line 4
        yield "<div class=\"container-fluid px-2 px-md-3 px-lg-4 py-3 min-vh-75 pb-5 pb-md-5 pb-lg-5\">

    ";
        // line 7
        yield "    <div class=\"d-flex flex-column flex-md-row justify-content-center justify-content-md-between align-items-center mb-3 mb-md-4 gap-2\">
        <h2 class=\"h5 h4-md fw-bold text-dark mb-0 text-center\">
            <i class=\"fas fa-desktop me-2 text-primary\"></i>Tableau de bord Résident
        </h2>
        <button class=\"btn btn-outline-primary btn-sm d-md-none\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#sidebarLots\">
            <i class=\"fas fa-bars me-1\"></i>Mes Biens (";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["lots"]) || array_key_exists("lots", $context) ? $context["lots"] : (function () { throw new RuntimeError('Variable "lots" does not exist.', 12, $this->source); })())), "html", null, true);
        yield ")
        </button>
    </div>

    ";
        // line 17
        yield "    <div class=\"row g-2 g-md-3 g-lg-4\" style= \"border: none; min-height: 600px\">

        ";
        // line 20
        yield "        <div class=\"col-12 col-md-4 col-lg-3\">
            <div class=\"collapse d-md-block h-md-100\" id=\"sidebarLots\">
                <div class=\"card shadow-sm border-0 mb-4 mb-md-4 h-100\" style=\"min-height: 500px;\">
                    <div class=\"card-header bg-primary text-white py-2 py-md-3\">
                        <h6 class=\"mb-0 fw-bold d-flex align-items-center\">
                            <i class=\"fas fa-list me-2\"></i>Mes Biens (";
        // line 25
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["lots"]) || array_key_exists("lots", $context) ? $context["lots"] : (function () { throw new RuntimeError('Variable "lots" does not exist.', 25, $this->source); })())), "html", null, true);
        yield ")
                        </h6>
                    </div>
                    <div class=\"list-group list-group-flush flex-grow-1 overflow-auto\" 
                         id=\"list-tab\" 
                         role=\"tablist\"
                         style=\"max-height: calc(100vh - 235px);\">
                        ";
        // line 32
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["lots"]) || array_key_exists("lots", $context) ? $context["lots"] : (function () { throw new RuntimeError('Variable "lots" does not exist.', 32, $this->source); })()));
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
            // line 33
            yield "                            <a href=\"#tab-";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "id", [], "any", false, false, false, 33), "html", null, true);
            yield "\" class=\"list-group-item list-group-item-action py-2 py-md-3 ";
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 33)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("active") : (""));
            yield "\"
                               id=\"tab-";
            // line 34
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "id", [], "any", false, false, false, 34), "html", null, true);
            yield "-list\" 
                               data-bs-toggle=\"list\"
                               role=\"tab\">
                                <div class=\"d-flex justify-content-between align-items-start\">
                                    <div>
                                        <strong class=\"text-uppercase small\">Lot ";
            // line 39
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "numeroLot", [], "any", false, false, false, 39), "html", null, true);
            yield "</strong><br>
                                        <small class=\"text-muted\">";
            // line 40
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "batiment", [], "any", false, false, false, 40), "nom", [], "any", false, false, false, 40), "html", null, true);
            yield "</small>
                                    </div>
                                    <span class=\"badge bg-light text-dark border rounded-pill flex-shrink-0 px-2 py-1 small\">
                                        ";
            // line 43
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 43), "html", null, true);
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
        // line 48
        yield "                    </div>
                </div>
            </div>
        </div>

        ";
        // line 54
        yield "        <div class=\"col-12 col-md-8 col-lg-9 d-flex flex-column\">
            
            ";
        // line 57
        yield "            <div class=\"tab-content flex-grow-1\" id=\"nav-tabContent\">
                ";
        // line 58
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["lots"]) || array_key_exists("lots", $context) ? $context["lots"] : (function () { throw new RuntimeError('Variable "lots" does not exist.', 58, $this->source); })()));
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
            // line 59
            yield "                    <div class=\"tab-pane fade h-100 ";
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 59)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("show active") : (""));
            yield "\" 
                         id=\"tab-";
            // line 60
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "id", [], "any", false, false, false, 60), "html", null, true);
            yield "\" 
                         role=\"tabpanel\">

                        ";
            // line 64
            yield "                        <div class=\"container-badges h-md-100\">

                            <div class=\"card shadow-sm border-0 mb-4\" style=\"border: 2px solid darkblue !important; min-height: 15rem !important;\">
                                <div class=\"card-body p-4 d-flex flex-column\" style=\"border: none;\">
    
                                    ";
            // line 70
            yield "                                    <div class=\"d-flex justify-content-between align-items-center mb-3\">
                                        <h3 class=\"h4 fw-bold text-dark\">Fiche du Lot ";
            // line 71
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "numeroLot", [], "any", false, false, false, 71), "html", null, true);
            yield "</h3>
                                        ";
            // line 72
            $context["is_proprio"] = (CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 72, $this->source); })()), "user", [], "any", false, false, false, 72) == CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "proprietaire", [], "any", false, false, false, 72));
            // line 73
            yield "                                        <span class=\"badge bg-light border rounded-pill px-2 py-1 small flex-shrink-0\">
                                            ";
            // line 74
            yield (((($tmp = (isset($context["is_proprio"]) || array_key_exists("is_proprio", $context) ? $context["is_proprio"] : (function () { throw new RuntimeError('Variable "is_proprio" does not exist.', 74, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Propriétaire") : ("Locataire"));
            yield "
                                        </span>
                                    </div>
    
                                    ";
            // line 79
            yield "                                    <div class=\"row g-3 mb-4 text-center bg-light rounded p-3 border-bottom pb-0\">
                                        <div class=\"col-auto flex-shrink-1 me-sm-2\">
                                            <small class=\"text-muted d-block\">Bâtiment</small>
                                            <strong>";
            // line 82
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "batiment", [], "any", false, false, false, 82), "nom", [], "any", false, false, false, 82), "html", null, true);
            yield "</strong>
                                        </div>
                                        <div class=\"col-auto flex-shrink-1 me-sm-2\">
                                            <small class=\"text-muted d-block\">Étage</small>
                                            <strong>";
            // line 86
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "etage", [], "any", false, false, false, 86), "html", null, true);
            yield "</strong>
                                        </div>
                                        <div class=\"col-auto flex-grow-1 text-start ms-sm-3\">
                                            <small class=\"text-muted d-block\">Position</small>
                                            <strong>";
            // line 90
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "position", [], "any", true, true, false, 90)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "position", [], "any", false, false, false, 90), "N/C")) : ("N/C")), "html", null, true);
            yield "</strong>
                                        </div>
                                    </div>
    
                                    ";
            // line 95
            yield "                                    <h6 class=\"fw-bold text-uppercase text-muted mb-2 justify-content-center\">Badges d'accès</h6>
                                    <div class=\"d-flex flex-wrap gap-3 justify-content-center\" style=\"border: 2px solid yellow;\">
                                        <!-- ";
            // line 97
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "badges", [], "any", false, false, false, 97));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["_key"] => $context["badge"]) {
                // line 98
                yield "                                            <span class=\"badge bg-light border rounded-pill px-2 py-1 small align-items-center d-flex\" style=\"gap: 0.5rem; border: none\">
                                            
                                                <i class=\"fas fa-key text-warning\"></i>
                                                <code>";
                // line 101
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["badge"], "numeroHexa", [], "any", false, false, false, 101), "html", null, true);
                yield "</code>
                                                <span class=\"badge ";
                // line 102
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["badge"], "status", [], "any", false, false, false, 102) == "Actif")) {
                    yield "bg-success";
                } else {
                    yield "bg-danger";
                }
                yield " small py-1 rounded-pill\" style=\"font-size: 0.6rem;\">
                                                    ";
                // line 103
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["badge"], "status", [], "any", false, false, false, 103)), "html", null, true);
                yield "
                                                    ";
                // line 104
                yield $this->extensions['Symfony\Bridge\Twig\Extension\DumpExtension']->dump($this->env, $context, CoreExtension::getAttribute($this->env, $this->source, $context["badge"], "status", [], "any", false, false, false, 104));
                yield "
    
                                            </span>
                                        ";
                $context['_iterated'] = true;
            }
            // line 107
            if (!$context['_iterated']) {
                // line 108
                yield "                                            <p class=\"text-muted small\">Aucun badge enregistré.</p>
                                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['badge'], $context['_parent'], $context['_iterated']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 109
            yield " -->
                                        ";
            // line 110
            $context["badgesActifs"] = Twig\Extension\CoreExtension::filter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "badges", [], "any", false, false, false, 110), function ($__b__) use ($context, $macros) { $context["b"] = $__b__; return (Twig\Extension\CoreExtension::lower($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["b"]) || array_key_exists("b", $context) ? $context["b"] : (function () { throw new RuntimeError('Variable "b" does not exist.', 110, $this->source); })()), "status", [], "any", false, false, false, 110)) == "actif"); });
            // line 111
            yield "    
                                        ";
            // line 112
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["badgesActifs"]) || array_key_exists("badgesActifs", $context) ? $context["badgesActifs"] : (function () { throw new RuntimeError('Variable "badgesActifs" does not exist.', 112, $this->source); })()));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["_key"] => $context["badge"]) {
                // line 113
                yield "                                            <span class=\"badge bg-light border rounded-pill px-2 py-1 small d-flex align-items-center\" style=\"gap: 0.5rem; border: none\">
                                                <i class=\"fas fa-key text-warning\"></i>
                                                <code>";
                // line 115
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["badge"], "numeroHexa", [], "any", false, false, false, 115), "html", null, true);
                yield "</code>
                                            
                                                <span class=\"badge bg-success small py-1 rounded-pill\" style=\"font-size: 0.6rem; \">
                                                    ";
                // line 118
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["badge"], "status", [], "any", false, false, false, 118)), "html", null, true);
                yield "
                                                </span>
                                            </span>
                                        ";
                $context['_iterated'] = true;
            }
            // line 121
            if (!$context['_iterated']) {
                // line 122
                yield "                                            <p class=\"text-muted small\">Aucun badge actif.</p>
                                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['badge'], $context['_parent'], $context['_iterated']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 124
            yield "                        </div>

                                    
                                    ";
            // line 128
            yield "                                    <!-- <ul style=\"margin-top: 20px;\">
                                        ";
            // line 129
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "badges", [], "any", false, false, false, 129));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["_key"] => $context["badge"]) {
                // line 130
                yield "                                        <li>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["badge"], "numeroHexa", [], "any", false, false, false, 130), "html", null, true);
                yield " - ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["badge"], "status", [], "any", false, false, false, 130), "html", null, true);
                yield "</li>
                                        ";
                $context['_iterated'] = true;
            }
            // line 131
            if (!$context['_iterated']) {
                // line 132
                yield "                                        <li>Aucun badge enregistré.</li>
                                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['badge'], $context['_parent'], $context['_iterated']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 134
            yield "                                    </ul> -->
                                </div>
                                
                            </div>
                        </div>

                        ";
            // line 141
            yield "                        <div class=\"card shadow-sm border-0 mb-4\">
                            <div class=\"card-body p-4 d-flex flex-column h-100\" style=\"min-height: 350px; margin-top: 800px; border: 2px solid red;\">

                                ";
            // line 145
            yield "                                ";
            $context["tiers"] = (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 145, $this->source); })()), "user", [], "any", false, false, false, 145) == CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "locataire", [], "any", false, false, false, 145))) ? (CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "proprietaire", [], "any", false, false, false, 145)) : (CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "locataire", [], "any", false, false, false, 145)));
            // line 146
            yield "                                <h6 class=\"fw-bold text-uppercase small mb-3\">
                                    Contact ";
            // line 147
            yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 147, $this->source); })()), "user", [], "any", false, false, false, 147) == CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "locataire", [], "any", false, false, false, 147))) ? ("Propriétaire") : ("Locataire"));
            yield "
                                </h6>

                                ";
            // line 151
            yield "                                ";
            if ((($tmp = (isset($context["tiers"]) || array_key_exists("tiers", $context) ? $context["tiers"] : (function () { throw new RuntimeError('Variable "tiers" does not exist.', 151, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 152
                yield "                                    <p class=\"mb-2 fw-semibold fs-5\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["tiers"]) || array_key_exists("tiers", $context) ? $context["tiers"] : (function () { throw new RuntimeError('Variable "tiers" does not exist.', 152, $this->source); })()), "prenom", [], "any", false, false, false, 152), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["tiers"]) || array_key_exists("tiers", $context) ? $context["tiers"] : (function () { throw new RuntimeError('Variable "tiers" does not exist.', 152, $this->source); })()), "nom", [], "any", false, false, false, 152), "html", null, true);
                yield "</p>
                                    <div class=\"d-flex flex-column gap-3 mb-0\">
                                        <a href=\"tel:";
                // line 154
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["tiers"]) || array_key_exists("tiers", $context) ? $context["tiers"] : (function () { throw new RuntimeError('Variable "tiers" does not exist.', 154, $this->source); })()), "telephone", [], "any", false, false, false, 154), "html", null, true);
                yield "\" class=\"text-decoration-none text-dark d-flex align-items-center\" style=\"gap: 0.2rem;\">
                                            <i class=\"fas fa-phone-alt me-1\"></i>
                                            ";
                // line 156
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["tiers"] ?? null), "telephone", [], "any", true, true, false, 156)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["tiers"]) || array_key_exists("tiers", $context) ? $context["tiers"] : (function () { throw new RuntimeError('Variable "tiers" does not exist.', 156, $this->source); })()), "telephone", [], "any", false, false, false, 156), "N/C")) : ("N/C")), "html", null, true);
                yield "
                                        </a>
                                        <a href=\"mailto:";
                // line 158
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["tiers"]) || array_key_exists("tiers", $context) ? $context["tiers"] : (function () { throw new RuntimeError('Variable "tiers" does not exist.', 158, $this->source); })()), "email", [], "any", false, false, false, 158), "html", null, true);
                yield "\" class=\"text-decoration-none text-dark d-flex align-items-center\" style=\"gap: 0.2rem;\">
                                            <i class=\"fas fa-envelope me-1\"></i>
                                            ";
                // line 160
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["tiers"]) || array_key_exists("tiers", $context) ? $context["tiers"] : (function () { throw new RuntimeError('Variable "tiers" does not exist.', 160, $this->source); })()), "email", [], "any", false, false, false, 160), "html", null, true);
                yield "
                                        </a>
                                    </div>
                                ";
            } else {
                // line 164
                yield "                                    <p class=\"text-muted small\">Aucune information disponible.</p>
                                ";
            }
            // line 166
            yield "
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
        // line 172
        yield "            </div>
        </div>
    </div>

    ";
        // line 177
        yield "    <div class=\"row mt-4\">
        <div class=\"col-md-8 col-lg-9 mx-auto\">

            ";
        // line 181
        yield "            <div class=\"card shadow-sm border-0 mb-4\" style=\"min-height: 180px;\">
                <div class=\"card-header bg-dark text-white py-3\">
                    <h6 class=\"mb-0 small fw-bold d-flex align-items-center\">
                        <i class=\"fas fa-info-circle me-2\"></i>Contacts Utiles
                    </h6>
                </div>
                <div class=\"card-body p-4 row g-3\">

                    ";
        // line 190
        yield "                    <div class=\"col-sm-6 col-md-4\">
                        <p class=\"mb-1 fw-bold text-primary\">Syndic Gestion</p>
                        <small><strong>Tel :</strong> 01 23 45 67 89</small><br>
                        <small><strong>Email :</strong> gestion@votre-syndic.com</small>
                    </div>

                    ";
        // line 197
        yield "                    <div class=\"col-sm-6 col-md-4\">
                        <p class=\"mb-1 fw-bold text-primary\">Gardiennage</p>
                        <small><strong>Tel :</strong> 06 98 76 54 32</small><br>
                        <small><strong>Horaires :</strong> 8h-12h / 14h-18h</small>
                    </div>

                    ";
        // line 204
        yield "                    <div class=\"col-md-4\">
                        <p class=\"mb-1 fw-bold text-primary\">Président du Conseil</p>
                        <small>M. Jean Dupont<br>Bâtiment B - 4ème étage</small>
                    </div>

                </div>
            </div>

            ";
        // line 213
        yield "            <div class=\"card shadow-sm border-0 mb-5\">
                <div class=\"card-header bg-white d-flex justify-content-between align-items-center py-3\" style=\"border-bottom: 2px solid #f8d7da;\">
                    <h6 class=\"fw-bold text-uppercase small\"><i class=\"fas fa-bullhorn text-warning me-1\"></i>Mes derniers signalements</h6>
                    <a href=\"";
        // line 216
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_incident_new");
        yield "\" class=\"btn btn-sm fw-semibold shadow-sm\" style=\"background-color: #ffc107; color:#212529;\">
                        <i class=\"fas fa-plus-circle me-1\"></i>SIGNALER
                    </a>
                </div>

                ";
        // line 222
        yield "                <ul class=\"list-group list-group-flush\">
                    ";
        // line 223
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["incidents"]) || array_key_exists("incidents", $context) ? $context["incidents"] : (function () { throw new RuntimeError('Variable "incidents" does not exist.', 223, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["incident"]) {
            // line 224
            yield "                        <li class=\"list-group-item d-flex justify-content-between align-items-center py-3\">
                            <span><strong>";
            // line 225
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["incident"], "titre", [], "any", false, false, false, 225), "html", null, true);
            yield "</strong> - Déclaré le ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["incident"], "dateCreation", [], "any", false, false, false, 225), "d/m/Y"), "html", null, true);
            yield "</span>
                            <span class=\"badge bg-info text-dark rounded-pill px-2 py-1 small\" style=\"font-size: 0.7rem;\">";
            // line 226
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["incident"], "statut", [], "any", false, false, false, 226), "html", null, true);
            yield "</span>
                        </li>
                    ";
            $context['_iterated'] = true;
        }
        // line 228
        if (!$context['_iterated']) {
            // line 229
            yield "                        <div class=\"p-5 text-center text-muted\">
                            <i class=\"fas fa-check-circle fa-3x mb-3 text-success\"></i><br>Tout est en ordre ! Aucun incident signalé.
                        </div>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['incident'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 233
        yield "                </ul>

            </div>

        </div>
    </div>


</div>";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "resident/index11.html.twig";
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
        return array (  564 => 233,  555 => 229,  553 => 228,  546 => 226,  540 => 225,  537 => 224,  532 => 223,  529 => 222,  521 => 216,  516 => 213,  506 => 204,  498 => 197,  490 => 190,  480 => 181,  475 => 177,  469 => 172,  450 => 166,  446 => 164,  439 => 160,  434 => 158,  429 => 156,  424 => 154,  416 => 152,  413 => 151,  407 => 147,  404 => 146,  401 => 145,  396 => 141,  388 => 134,  381 => 132,  379 => 131,  370 => 130,  365 => 129,  362 => 128,  357 => 124,  350 => 122,  348 => 121,  340 => 118,  334 => 115,  330 => 113,  325 => 112,  322 => 111,  320 => 110,  317 => 109,  310 => 108,  308 => 107,  300 => 104,  296 => 103,  288 => 102,  284 => 101,  279 => 98,  274 => 97,  270 => 95,  263 => 90,  256 => 86,  249 => 82,  244 => 79,  237 => 74,  234 => 73,  232 => 72,  228 => 71,  225 => 70,  218 => 64,  212 => 60,  207 => 59,  190 => 58,  187 => 57,  183 => 54,  176 => 48,  157 => 43,  151 => 40,  147 => 39,  139 => 34,  132 => 33,  115 => 32,  105 => 25,  98 => 20,  94 => 17,  87 => 12,  80 => 7,  76 => 4,  63 => 3,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block body %}
<div class=\"container-fluid px-2 px-md-3 px-lg-4 py-3 min-vh-75 pb-5 pb-md-5 pb-lg-5\">

    {# ── EN-TÊTE ── #}
    <div class=\"d-flex flex-column flex-md-row justify-content-center justify-content-md-between align-items-center mb-3 mb-md-4 gap-2\">
        <h2 class=\"h5 h4-md fw-bold text-dark mb-0 text-center\">
            <i class=\"fas fa-desktop me-2 text-primary\"></i>Tableau de bord Résident
        </h2>
        <button class=\"btn btn-outline-primary btn-sm d-md-none\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#sidebarLots\">
            <i class=\"fas fa-bars me-1\"></i>Mes Biens ({{ lots|length }})
        </button>
    </div>

    {# ── LIGNE PRINCIPALE ── #}
    <div class=\"row g-2 g-md-3 g-lg-4\" style= \"border: none; min-height: 600px\">

        {# ═══ SIDEBAR : LISTE DES BIENS ═══ #}
        <div class=\"col-12 col-md-4 col-lg-3\">
            <div class=\"collapse d-md-block h-md-100\" id=\"sidebarLots\">
                <div class=\"card shadow-sm border-0 mb-4 mb-md-4 h-100\" style=\"min-height: 500px;\">
                    <div class=\"card-header bg-primary text-white py-2 py-md-3\">
                        <h6 class=\"mb-0 fw-bold d-flex align-items-center\">
                            <i class=\"fas fa-list me-2\"></i>Mes Biens ({{ lots|length }})
                        </h6>
                    </div>
                    <div class=\"list-group list-group-flush flex-grow-1 overflow-auto\" 
                         id=\"list-tab\" 
                         role=\"tablist\"
                         style=\"max-height: calc(100vh - 235px);\">
                        {% for lot in lots %}
                            <a href=\"#tab-{{ lot.id }}\" class=\"list-group-item list-group-item-action py-2 py-md-3 {{ loop.first ? 'active' : '' }}\"
                               id=\"tab-{{ lot.id }}-list\" 
                               data-bs-toggle=\"list\"
                               role=\"tab\">
                                <div class=\"d-flex justify-content-between align-items-start\">
                                    <div>
                                        <strong class=\"text-uppercase small\">Lot {{ lot.numeroLot }}</strong><br>
                                        <small class=\"text-muted\">{{ lot.batiment.nom }}</small>
                                    </div>
                                    <span class=\"badge bg-light text-dark border rounded-pill flex-shrink-0 px-2 py-1 small\">
                                        {{ loop.index }}
                                    </span>
                                </div>
                            </a>
                        {% endfor %}
                    </div>
                </div>
            </div>
        </div>

        {# ═══ CONTENU PRINCIPAL ═══ #}
        <div class=\"col-12 col-md-8 col-lg-9 d-flex flex-column\">
            
            {# ── ZONE FICHE LOT + CONTACT ── #}
            <div class=\"tab-content flex-grow-1\" id=\"nav-tabContent\">
                {% for lot in lots %}
                    <div class=\"tab-pane fade h-100 {{ loop.first ? 'show active' : '' }}\" 
                         id=\"tab-{{ lot.id }}\" 
                         role=\"tabpanel\">

                        {# FICHE PRINCIPALE #}
                        <div class=\"container-badges h-md-100\">

                            <div class=\"card shadow-sm border-0 mb-4\" style=\"border: 2px solid darkblue !important; min-height: 15rem !important;\">
                                <div class=\"card-body p-4 d-flex flex-column\" style=\"border: none;\">
    
                                    {# Title & Status #}
                                    <div class=\"d-flex justify-content-between align-items-center mb-3\">
                                        <h3 class=\"h4 fw-bold text-dark\">Fiche du Lot {{ lot.numeroLot }}</h3>
                                        {% set is_proprio = (app.user == lot.proprietaire) %}
                                        <span class=\"badge bg-light border rounded-pill px-2 py-1 small flex-shrink-0\">
                                            {{ is_proprio ? 'Propriétaire' : 'Locataire' }}
                                        </span>
                                    </div>
    
                                    {# Building Info #}
                                    <div class=\"row g-3 mb-4 text-center bg-light rounded p-3 border-bottom pb-0\">
                                        <div class=\"col-auto flex-shrink-1 me-sm-2\">
                                            <small class=\"text-muted d-block\">Bâtiment</small>
                                            <strong>{{ lot.batiment.nom }}</strong>
                                        </div>
                                        <div class=\"col-auto flex-shrink-1 me-sm-2\">
                                            <small class=\"text-muted d-block\">Étage</small>
                                            <strong>{{ lot.etage }}</strong>
                                        </div>
                                        <div class=\"col-auto flex-grow-1 text-start ms-sm-3\">
                                            <small class=\"text-muted d-block\">Position</small>
                                            <strong>{{ lot.position|default('N/C') }}</strong>
                                        </div>
                                    </div>
    
                                    {# Access Badges #}
                                    <h6 class=\"fw-bold text-uppercase text-muted mb-2 justify-content-center\">Badges d'accès</h6>
                                    <div class=\"d-flex flex-wrap gap-3 justify-content-center\" style=\"border: 2px solid yellow;\">
                                        <!-- {% for badge in lot.badges %}
                                            <span class=\"badge bg-light border rounded-pill px-2 py-1 small align-items-center d-flex\" style=\"gap: 0.5rem; border: none\">
                                            
                                                <i class=\"fas fa-key text-warning\"></i>
                                                <code>{{ badge.numeroHexa }}</code>
                                                <span class=\"badge {% if badge.status == 'Actif' %}bg-success{% else %}bg-danger{% endif %} small py-1 rounded-pill\" style=\"font-size: 0.6rem;\">
                                                    {{ badge.status|upper }}
                                                    {{ dump(badge.status) }}
    
                                            </span>
                                        {% else %}
                                            <p class=\"text-muted small\">Aucun badge enregistré.</p>
                                        {% endfor %} -->
                                        {% set badgesActifs = lot.badges|filter(b => b.status|lower == 'actif') %}
    
                                        {% for badge in badgesActifs %}
                                            <span class=\"badge bg-light border rounded-pill px-2 py-1 small d-flex align-items-center\" style=\"gap: 0.5rem; border: none\">
                                                <i class=\"fas fa-key text-warning\"></i>
                                                <code>{{ badge.numeroHexa }}</code>
                                            
                                                <span class=\"badge bg-success small py-1 rounded-pill\" style=\"font-size: 0.6rem; \">
                                                    {{ badge.status|upper }}
                                                </span>
                                            </span>
                                        {% else %}
                                            <p class=\"text-muted small\">Aucun badge actif.</p>
                                        {% endfor %}
                        </div>

                                    
                                    {# Debugging: Show all badges and their status #}
                                    <!-- <ul style=\"margin-top: 20px;\">
                                        {% for badge in lot.badges %}
                                        <li>{{ badge.numeroHexa }} - {{ badge.status }}</li>
                                        {% else %}
                                        <li>Aucun badge enregistré.</li>
                                        {% endfor %}
                                    </ul> -->
                                </div>
                                
                            </div>
                        </div>

                        {# CONTACT TIERS #}
                        <div class=\"card shadow-sm border-0 mb-4\">
                            <div class=\"card-body p-4 d-flex flex-column h-100\" style=\"min-height: 350px; margin-top: 800px; border: 2px solid red;\">

                                {# Header #}
                                {% set tiers = (app.user == lot.locataire) ? lot.proprietaire : lot.locataire %}
                                <h6 class=\"fw-bold text-uppercase small mb-3\">
                                    Contact {{ app.user == lot.locataire ? 'Propriétaire' : 'Locataire' }}
                                </h6>

                                {# Tiers Info #}
                                {% if tiers %}
                                    <p class=\"mb-2 fw-semibold fs-5\">{{ tiers.prenom }} {{ tiers.nom }}</p>
                                    <div class=\"d-flex flex-column gap-3 mb-0\">
                                        <a href=\"tel:{{ tiers.telephone }}\" class=\"text-decoration-none text-dark d-flex align-items-center\" style=\"gap: 0.2rem;\">
                                            <i class=\"fas fa-phone-alt me-1\"></i>
                                            {{ tiers.telephone|default('N/C') }}
                                        </a>
                                        <a href=\"mailto:{{ tiers.email }}\" class=\"text-decoration-none text-dark d-flex align-items-center\" style=\"gap: 0.2rem;\">
                                            <i class=\"fas fa-envelope me-1\"></i>
                                            {{ tiers.email }}
                                        </a>
                                    </div>
                                {% else %}
                                    <p class=\"text-muted small\">Aucune information disponible.</p>
                                {% endif %}

                            </div>
                        </div>

                    </div>
                {% endfor %}
            </div>
        </div>
    </div>

    {# ── NOUVELLE LIGNE : CARDS CENTRÉES ── #}
    <div class=\"row mt-4\">
        <div class=\"col-md-8 col-lg-9 mx-auto\">

            {# ── CONTACTS UTILES ── #}
            <div class=\"card shadow-sm border-0 mb-4\" style=\"min-height: 180px;\">
                <div class=\"card-header bg-dark text-white py-3\">
                    <h6 class=\"mb-0 small fw-bold d-flex align-items-center\">
                        <i class=\"fas fa-info-circle me-2\"></i>Contacts Utiles
                    </h6>
                </div>
                <div class=\"card-body p-4 row g-3\">

                    {# Syndic Gestion #}
                    <div class=\"col-sm-6 col-md-4\">
                        <p class=\"mb-1 fw-bold text-primary\">Syndic Gestion</p>
                        <small><strong>Tel :</strong> 01 23 45 67 89</small><br>
                        <small><strong>Email :</strong> gestion@votre-syndic.com</small>
                    </div>

                    {# Gardiennage #}
                    <div class=\"col-sm-6 col-md-4\">
                        <p class=\"mb-1 fw-bold text-primary\">Gardiennage</p>
                        <small><strong>Tel :</strong> 06 98 76 54 32</small><br>
                        <small><strong>Horaires :</strong> 8h-12h / 14h-18h</small>
                    </div>

                    {# President du Conseil #}
                    <div class=\"col-md-4\">
                        <p class=\"mb-1 fw-bold text-primary\">Président du Conseil</p>
                        <small>M. Jean Dupont<br>Bâtiment B - 4ème étage</small>
                    </div>

                </div>
            </div>

            {# ── SIGNALEMENTS ── #}
            <div class=\"card shadow-sm border-0 mb-5\">
                <div class=\"card-header bg-white d-flex justify-content-between align-items-center py-3\" style=\"border-bottom: 2px solid #f8d7da;\">
                    <h6 class=\"fw-bold text-uppercase small\"><i class=\"fas fa-bullhorn text-warning me-1\"></i>Mes derniers signalements</h6>
                    <a href=\"{{ path('app_incident_new') }}\" class=\"btn btn-sm fw-semibold shadow-sm\" style=\"background-color: #ffc107; color:#212529;\">
                        <i class=\"fas fa-plus-circle me-1\"></i>SIGNALER
                    </a>
                </div>

                {# Incidents List #}
                <ul class=\"list-group list-group-flush\">
                    {% for incident in incidents %}
                        <li class=\"list-group-item d-flex justify-content-between align-items-center py-3\">
                            <span><strong>{{ incident.titre }}</strong> - Déclaré le {{ incident.dateCreation|date('d/m/Y') }}</span>
                            <span class=\"badge bg-info text-dark rounded-pill px-2 py-1 small\" style=\"font-size: 0.7rem;\">{{ incident.statut }}</span>
                        </li>
                    {% else %}
                        <div class=\"p-5 text-center text-muted\">
                            <i class=\"fas fa-check-circle fa-3x mb-3 text-success\"></i><br>Tout est en ordre ! Aucun incident signalé.
                        </div>
                    {% endfor %}
                </ul>

            </div>

        </div>
    </div>


</div>{% endblock %}", "resident/index11.html.twig", "C:\\laragon\\www\\syndicopro2\\templates\\resident\\index11.html.twig");
    }
}
