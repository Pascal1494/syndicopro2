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

/* dashboard/index.html.twig */
class __TwigTemplate_233bf6fb0e5d520b3cd281da64cd4967 extends Template
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
            'title' => [$this, 'block_title'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashboard/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashboard/index.html.twig"));

        $this->parent = $this->load("base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Mon Tableau de Bord";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
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
        yield "<h1>COUCOU C'EST MOI</h1>
<div class=\"container mt-4\">
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h2 class=\"text-primary\"><i class=\"fa fa-gauge-high\"></i> Mon Espace Personnel</h2>
        <a href=\"";
        // line 10
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_incident_new");
        yield "\" class=\"btn btn-warning shadow-sm\">
            <i class=\"fa fa-plus-circle\"></i> Signaler un incident
        </a>
    </div>

    ";
        // line 15
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["lots"]) || array_key_exists("lots", $context) ? $context["lots"] : (function () { throw new RuntimeError('Variable "lots" does not exist.', 15, $this->source); })())) > 0)) {
            // line 16
            yield "        <div class=\"row\">
            ";
            // line 18
            yield "            <div class=\"col-md-4\">
                <div class=\"card shadow-sm border-0 mb-4\">
                    <div class=\"card-header bg-primary text-white\">
                        <h6 class=\"mb-0\"><i class=\"fa fa-list\"></i> Mes Biens & Annexes</h6>
                    </div>
                    <div class=\"list-group list-group-flush\" id=\"list-tab\" role=\"tablist\">
                        ";
            // line 24
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["lots"]) || array_key_exists("lots", $context) ? $context["lots"] : (function () { throw new RuntimeError('Variable "lots" does not exist.', 24, $this->source); })()));
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
                // line 25
                yield "                            <a class=\"list-group-item list-group-item-action ";
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 25)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("active") : (""));
                yield " p-3\" 
                               id=\"list-lot-";
                // line 26
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "id", [], "any", false, false, false, 26), "html", null, true);
                yield "-list\" 
                               data-bs-toggle=\"list\" 
                               href=\"#list-lot-";
                // line 28
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "id", [], "any", false, false, false, 28), "html", null, true);
                yield "\" 
                               role=\"tab\">
                                <div class=\"d-flex w-100 justify-content-between\">
                                    <h6 class=\"mb-1\">Lot ";
                // line 31
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "numeroLot", [], "any", false, false, false, 31), "html", null, true);
                yield "</h6>
                                    <small class=\"badge bg-light text-dark border\">";
                // line 32
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "type", [], "any", false, false, false, 32)), "html", null, true);
                yield "</small>
                                </div>
                                <small class=\"text-muted\"><i class=\"fa fa-building small\"></i> ";
                // line 34
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "batiment", [], "any", false, false, false, 34), "nom", [], "any", false, false, false, 34), "html", null, true);
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
            // line 37
            yield "                    </div>
                </div>
            </div>

            ";
            // line 42
            yield "            <div class=\"col-md-8\">
                <div class=\"tab-content shadow-sm bg-white rounded p-4\" id=\"nav-tabContent\">
                    ";
            // line 44
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["lots"]) || array_key_exists("lots", $context) ? $context["lots"] : (function () { throw new RuntimeError('Variable "lots" does not exist.', 44, $this->source); })()));
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
                // line 45
                yield "                        <div class=\"tab-pane fade ";
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 45)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("show active") : (""));
                yield "\" 
                             id=\"list-lot-";
                // line 46
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "id", [], "any", false, false, false, 46), "html", null, true);
                yield "\" 
                             role=\"tabpanel\" 
                             aria-labelledby=\"list-lot-";
                // line 48
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "id", [], "any", false, false, false, 48), "html", null, true);
                yield "-list\">
                            
                            <div class=\"d-flex justify-content-between border-bottom pb-3 mb-3\">
                                <h4 class=\"text-dark\">Lot ";
                // line 51
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "numeroLot", [], "any", false, false, false, 51), "html", null, true);
                yield " - ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "type", [], "any", false, false, false, 51)), "html", null, true);
                yield "</h4>
                                <span class=\"text-muted\">";
                // line 52
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "batiment", [], "any", false, false, false, 52), "copropriete", [], "any", false, false, false, 52), "nom", [], "any", false, false, false, 52), "html", null, true);
                yield "</span>
                            </div>

                            <div class=\"row g-3\">
                                ";
                // line 57
                yield "                                <div class=\"col-md-6\">
                                    <div class=\"p-3 bg-light rounded border\">
                                        <h6 class=\"text-muted small text-uppercase mb-3\">Configuration</h6>
                                        <p class=\"mb-2\"><strong>Bâtiment :</strong> ";
                // line 60
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "batiment", [], "any", false, false, false, 60), "nom", [], "any", false, false, false, 60), "html", null, true);
                yield "</p>
                                        <p class=\"mb-2\"><strong>Étage :</strong> ";
                // line 61
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "etage", [], "any", true, true, false, 61)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "etage", [], "any", false, false, false, 61), "RDC")) : ("RDC")), "html", null, true);
                yield "</p>
                                        <p class=\"mb-2\"><strong>Porte :</strong> ";
                // line 62
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "porte", [], "any", true, true, false, 62)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "porte", [], "any", false, false, false, 62), "-")) : ("-")), "html", null, true);
                yield "</p>
                                        <p class=\"mb-0\"><strong>Tantièmes :</strong> ";
                // line 63
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "tantieme", [], "any", false, false, false, 63), "html", null, true);
                yield " / 1000</p>
                                    </div>
                                </div>

                                ";
                // line 68
                yield "                                <div class=\"col-md-6\">
                                    <div class=\"p-3 bg-light rounded border h-100\">
                                        <h6 class=\"text-muted small text-uppercase mb-3\">Badges d'accès</h6>
                                        ";
                // line 71
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "badges", [], "any", false, false, false, 71)) > 0)) {
                    // line 72
                    yield "                                            <div class=\"list-group\">
                                                ";
                    // line 73
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "badges", [], "any", false, false, false, 73));
                    foreach ($context['_seq'] as $context["_key"] => $context["badge"]) {
                        // line 74
                        yield "                                                    <div class=\"d-flex justify-content-between align-items-center mb-2 p-2 bg-white rounded border-sm shadow-xs\">
                                                        <span class=\"small font-monospace text-primary\">";
                        // line 75
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["badge"], "numero", [], "any", false, false, false, 75), "html", null, true);
                        yield "</span>
                                                        ";
                        // line 77
                        yield "                                                        ";
                        $context["status_color"] = "bg-secondary";
                        // line 78
                        yield "                                                        ";
                        if ((CoreExtension::getAttribute($this->env, $this->source, $context["badge"], "statut", [], "any", false, false, false, 78) == "ACTIF")) {
                            $context["status_color"] = "bg-success";
                            // line 79
                            yield "                                                        ";
                        } elseif ((CoreExtension::getAttribute($this->env, $this->source, $context["badge"], "statut", [], "any", false, false, false, 79) == "VOLÉ")) {
                            $context["status_color"] = "bg-danger";
                            // line 80
                            yield "                                                        ";
                        } elseif ((CoreExtension::getAttribute($this->env, $this->source, $context["badge"], "statut", [], "any", false, false, false, 80) == "CASSÉ")) {
                            $context["status_color"] = "bg-warning text-dark";
                            // line 81
                            yield "                                                        ";
                        }
                        // line 82
                        yield "                                                        <span class=\"badge ";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["status_color"]) || array_key_exists("status_color", $context) ? $context["status_color"] : (function () { throw new RuntimeError('Variable "status_color" does not exist.', 82, $this->source); })()), "html", null, true);
                        yield "\">";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["badge"], "statut", [], "any", false, false, false, 82), "html", null, true);
                        yield "</span>
                                                    </div>
                                                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_key'], $context['badge'], $context['_parent']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 85
                    yield "                                            </div>
                                        ";
                } else {
                    // line 87
                    yield "                                            <p class=\"text-muted small italic\">Aucun badge enregistré.</p>
                                        ";
                }
                // line 89
                yield "                                    </div>
                                </div>
                            </div>

                            ";
                // line 94
                yield "                            <div class=\"mt-4 pt-3 border-top text-end\">
                                <a href=\"";
                // line 95
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_incident_new", ["lot" => CoreExtension::getAttribute($this->env, $this->source, $context["lot"], "id", [], "any", false, false, false, 95)]), "html", null, true);
                yield "\" class=\"btn btn-outline-warning btn-sm\">
                                    <i class=\"fa fa-triangle-exclamation\"></i> Signaler un problème sur ce lot
                                </a>
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
            // line 101
            yield "                </div>
                
                ";
            // line 104
            yield "                <div class=\"card mt-4 shadow-sm border-0 bg-light\">
                    <div class=\"card-body\">
                        <h6><i class=\"fa fa-info-circle text-info\"></i> Informations Syndic</h6>
                        <p class=\"small text-muted mb-0\">Retrouvez les détails de votre copropriété et les contacts utiles dans le menu \"Gestion\".</p>
                    </div>
                </div>
            </div>
        </div>
    ";
        } else {
            // line 113
            yield "        <div class=\"alert alert-info shadow-sm\">
            <i class=\"fa fa-circle-info\"></i> Aucun lot n'est rattaché à votre compte pour le moment.
        </div>
    ";
        }
        // line 117
        yield "</div>
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
        return "dashboard/index.html.twig";
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
        return array (  375 => 117,  369 => 113,  358 => 104,  354 => 101,  334 => 95,  331 => 94,  325 => 89,  321 => 87,  317 => 85,  305 => 82,  302 => 81,  298 => 80,  294 => 79,  290 => 78,  287 => 77,  283 => 75,  280 => 74,  276 => 73,  273 => 72,  271 => 71,  266 => 68,  259 => 63,  255 => 62,  251 => 61,  247 => 60,  242 => 57,  235 => 52,  229 => 51,  223 => 48,  218 => 46,  213 => 45,  196 => 44,  192 => 42,  186 => 37,  169 => 34,  164 => 32,  160 => 31,  154 => 28,  149 => 26,  144 => 25,  127 => 24,  119 => 18,  116 => 16,  114 => 15,  106 => 10,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Mon Tableau de Bord{% endblock %}

{% block body %}
<h1>COUCOU C'EST MOI</h1>
<div class=\"container mt-4\">
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h2 class=\"text-primary\"><i class=\"fa fa-gauge-high\"></i> Mon Espace Personnel</h2>
        <a href=\"{{ path('app_incident_new') }}\" class=\"btn btn-warning shadow-sm\">
            <i class=\"fa fa-plus-circle\"></i> Signaler un incident
        </a>
    </div>

    {% if lots|length > 0 %}
        <div class=\"row\">
            {# --- COLONNE GAUCHE : LISTE DES LOTS --- #}
            <div class=\"col-md-4\">
                <div class=\"card shadow-sm border-0 mb-4\">
                    <div class=\"card-header bg-primary text-white\">
                        <h6 class=\"mb-0\"><i class=\"fa fa-list\"></i> Mes Biens & Annexes</h6>
                    </div>
                    <div class=\"list-group list-group-flush\" id=\"list-tab\" role=\"tablist\">
                        {% for lot in lots %}
                            <a class=\"list-group-item list-group-item-action {{ loop.first ? 'active' : '' }} p-3\" 
                               id=\"list-lot-{{ lot.id }}-list\" 
                               data-bs-toggle=\"list\" 
                               href=\"#list-lot-{{ lot.id }}\" 
                               role=\"tab\">
                                <div class=\"d-flex w-100 justify-content-between\">
                                    <h6 class=\"mb-1\">Lot {{ lot.numeroLot }}</h6>
                                    <small class=\"badge bg-light text-dark border\">{{ lot.type|capitalize }}</small>
                                </div>
                                <small class=\"text-muted\"><i class=\"fa fa-building small\"></i> {{ lot.batiment.nom }}</small>
                            </a>
                        {% endfor %}
                    </div>
                </div>
            </div>

            {# --- COLONNE DROITE : DÉTAILS DU LOT SÉLECTIONNÉ --- #}
            <div class=\"col-md-8\">
                <div class=\"tab-content shadow-sm bg-white rounded p-4\" id=\"nav-tabContent\">
                    {% for lot in lots %}
                        <div class=\"tab-pane fade {{ loop.first ? 'show active' : '' }}\" 
                             id=\"list-lot-{{ lot.id }}\" 
                             role=\"tabpanel\" 
                             aria-labelledby=\"list-lot-{{ lot.id }}-list\">
                            
                            <div class=\"d-flex justify-content-between border-bottom pb-3 mb-3\">
                                <h4 class=\"text-dark\">Lot {{ lot.numeroLot }} - {{ lot.type|capitalize }}</h4>
                                <span class=\"text-muted\">{{ lot.batiment.copropriete.nom }}</span>
                            </div>

                            <div class=\"row g-3\">
                                {# Infos Techniques #}
                                <div class=\"col-md-6\">
                                    <div class=\"p-3 bg-light rounded border\">
                                        <h6 class=\"text-muted small text-uppercase mb-3\">Configuration</h6>
                                        <p class=\"mb-2\"><strong>Bâtiment :</strong> {{ lot.batiment.nom }}</p>
                                        <p class=\"mb-2\"><strong>Étage :</strong> {{ lot.etage|default('RDC') }}</p>
                                        <p class=\"mb-2\"><strong>Porte :</strong> {{ lot.porte|default('-') }}</p>
                                        <p class=\"mb-0\"><strong>Tantièmes :</strong> {{ lot.tantieme }} / 1000</p>
                                    </div>
                                </div>

                                {# Section Badges avec couleurs dynamiques #}
                                <div class=\"col-md-6\">
                                    <div class=\"p-3 bg-light rounded border h-100\">
                                        <h6 class=\"text-muted small text-uppercase mb-3\">Badges d'accès</h6>
                                        {% if lot.badges|length > 0 %}
                                            <div class=\"list-group\">
                                                {% for badge in lot.badges %}
                                                    <div class=\"d-flex justify-content-between align-items-center mb-2 p-2 bg-white rounded border-sm shadow-xs\">
                                                        <span class=\"small font-monospace text-primary\">{{ badge.numero }}</span>
                                                        {# Logique de couleur pour le statut #}
                                                        {% set status_color = 'bg-secondary' %}
                                                        {% if badge.statut == 'ACTIF' %}{% set status_color = 'bg-success' %}
                                                        {% elseif badge.statut == 'VOLÉ' %}{% set status_color = 'bg-danger' %}
                                                        {% elseif badge.statut == 'CASSÉ' %}{% set status_color = 'bg-warning text-dark' %}
                                                        {% endif %}
                                                        <span class=\"badge {{ status_color }}\">{{ badge.statut }}</span>
                                                    </div>
                                                {% endfor %}
                                            </div>
                                        {% else %}
                                            <p class=\"text-muted small italic\">Aucun badge enregistré.</p>
                                        {% endif %}
                                    </div>
                                </div>
                            </div>

                            {# Actions Rapides #}
                            <div class=\"mt-4 pt-3 border-top text-end\">
                                <a href=\"{{ path('app_incident_new', {'lot': lot.id}) }}\" class=\"btn btn-outline-warning btn-sm\">
                                    <i class=\"fa fa-triangle-exclamation\"></i> Signaler un problème sur ce lot
                                </a>
                            </div>
                        </div>
                    {% endfor %}
                </div>
                
                {# Petit bloc pour les incidents en cours (optionnel) #}
                <div class=\"card mt-4 shadow-sm border-0 bg-light\">
                    <div class=\"card-body\">
                        <h6><i class=\"fa fa-info-circle text-info\"></i> Informations Syndic</h6>
                        <p class=\"small text-muted mb-0\">Retrouvez les détails de votre copropriété et les contacts utiles dans le menu \"Gestion\".</p>
                    </div>
                </div>
            </div>
        </div>
    {% else %}
        <div class=\"alert alert-info shadow-sm\">
            <i class=\"fa fa-circle-info\"></i> Aucun lot n'est rattaché à votre compte pour le moment.
        </div>
    {% endif %}
</div>
{% endblock %}", "dashboard/index.html.twig", "C:\\laragon\\www\\syndicopro2\\templates\\dashboard\\index.html.twig");
    }
}
