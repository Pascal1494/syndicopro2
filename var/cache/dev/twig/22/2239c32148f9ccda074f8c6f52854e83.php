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

/* admin/recherche_resultats.html.twig */
class __TwigTemplate_c99da80909bc894efa1d72590d062d23 extends Template
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
            'page_title' => [$this, 'block_page_title'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "@EasyAdmin/page/content.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/recherche_resultats.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/recherche_resultats.html.twig"));

        $this->parent = $this->load("@EasyAdmin/page/content.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_page_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "page_title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "page_title"));

        yield "Résultats pour \"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["q"]) || array_key_exists("q", $context) ? $context["q"] : (function () { throw new RuntimeError('Variable "q" does not exist.', 3, $this->source); })()), "html", null, true);
        yield "\"";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 6
        yield "    <a href=\"";
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin");
        yield "\" class=\"btn btn-secondary mb-4\">⬅ Retour au tableau de bord</a>

    <div class=\"row\">
        <div class=\"col-md-6 mb-4\">
            <div class=\"card\">
                <div class=\"card-header bg-primary text-white\">
                    👤 Utilisateurs trouvés (";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["users"]) || array_key_exists("users", $context) ? $context["users"] : (function () { throw new RuntimeError('Variable "users" does not exist.', 12, $this->source); })())), "html", null, true);
        yield ")
                </div>
                <ul class=\"list-group list-group-flush\">
                    ";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["users"]) || array_key_exists("users", $context) ? $context["users"] : (function () { throw new RuntimeError('Variable "users" does not exist.', 15, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 16
            yield "                        ";
            // line 17
            yield "                        ";
            $context["editUrl"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $this->extensions['EasyCorp\Bundle\EasyAdminBundle\Twig\EasyAdminTwigExtension']->getAdminUrlGenerator(), "setController", ["App\\Controller\\Admin\\UserCrudController"], "method", false, false, false, 17), "setAction", ["edit"], "method", false, false, false, 18), "setEntityId", [CoreExtension::getAttribute($this->env, $this->source,             // line 20
$context["user"], "id", [], "any", false, false, false, 20)], "method", false, false, false, 19);
            // line 22
            yield "                        
                        <li class=\"list-group-item d-flex justify-content-between align-items-center\">
                            <div>
                                <strong>";
            // line 25
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "nom", [], "any", false, false, false, 25), "html", null, true);
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "prenom", [], "any", false, false, false, 25), "html", null, true);
            yield "</strong><br>
                                <small class=\"text-muted\">";
            // line 26
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "telephone", [], "any", false, false, false, 26), "html", null, true);
            yield " | ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["user"], "statutOccupation", [], "any", true, true, false, 26)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "statutOccupation", [], "any", false, false, false, 26), "Staff")) : ("Staff")), "html", null, true);
            yield "</small>
                            </div>
                            <a href=\"";
            // line 28
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["editUrl"]) || array_key_exists("editUrl", $context) ? $context["editUrl"] : (function () { throw new RuntimeError('Variable "editUrl" does not exist.', 28, $this->source); })()), "html", null, true);
            yield "\" class=\"btn btn-sm btn-outline-primary\">Ouvrir</a>
                        </li>
                    ";
            $context['_iterated'] = true;
        }
        // line 30
        if (!$context['_iterated']) {
            // line 31
            yield "                        <li class=\"list-group-item text-muted\">Aucun utilisateur trouvé.</li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['user'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        yield "                </ul>
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
        return "admin/recherche_resultats.html.twig";
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
        return array (  163 => 33,  156 => 31,  154 => 30,  147 => 28,  140 => 26,  134 => 25,  129 => 22,  127 => 20,  125 => 17,  123 => 16,  118 => 15,  112 => 12,  102 => 6,  89 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends '@EasyAdmin/page/content.html.twig' %}

{% block page_title %}Résultats pour \"{{ q }}\"{% endblock %}

{% block content %}
    <a href=\"{{ path('admin') }}\" class=\"btn btn-secondary mb-4\">⬅ Retour au tableau de bord</a>

    <div class=\"row\">
        <div class=\"col-md-6 mb-4\">
            <div class=\"card\">
                <div class=\"card-header bg-primary text-white\">
                    👤 Utilisateurs trouvés ({{ users|length }})
                </div>
                <ul class=\"list-group list-group-flush\">
                    {% for user in users %}
                        {# ✨ On génère le lien vers l'édition de cet utilisateur précis ! #}
                        {% set editUrl = ea_url()
                            .setController('App\\\\Controller\\\\Admin\\\\UserCrudController')
                            .setAction('edit')
                            .setEntityId(user.id) 
                        %}
                        
                        <li class=\"list-group-item d-flex justify-content-between align-items-center\">
                            <div>
                                <strong>{{ user.nom }} {{ user.prenom }}</strong><br>
                                <small class=\"text-muted\">{{ user.telephone }} | {{ user.statutOccupation|default('Staff') }}</small>
                            </div>
                            <a href=\"{{ editUrl }}\" class=\"btn btn-sm btn-outline-primary\">Ouvrir</a>
                        </li>
                    {% else %}
                        <li class=\"list-group-item text-muted\">Aucun utilisateur trouvé.</li>
                    {% endfor %}
                </ul>
            </div>
        </div>

        </div>
{% endblock %}", "admin/recherche_resultats.html.twig", "C:\\laragon\\www\\syndicopro2\\templates\\admin\\recherche_resultats.html.twig");
    }
}
