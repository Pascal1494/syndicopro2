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

/* admin/badge_index.html.twig */
class __TwigTemplate_939564157537ecc8c6ce7dc8f515d18c extends Template
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
            'page_actions' => [$this, 'block_page_actions'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 2
        return "@EasyAdmin/crud/index.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/badge_index.html.twig"));

        $this->parent = $this->load("@EasyAdmin/crud/index.html.twig", 2);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_page_actions(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "page_actions"));

        // line 6
        yield "    
    ";
        // line 8
        yield "    <div class=\"d-flex align-items-center me-3\">
        <span class=\"badge bg-dark p-2 fs-6\">
            <i class=\"fas fa-id-badge me-2\"></i> ";
        // line 10
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["paginator"]) || array_key_exists("paginator", $context) ? $context["paginator"] : (function () { throw new RuntimeError('Variable "paginator" does not exist.', 10, $this->source); })()), "numResults", [], "any", false, false, false, 10), "html", null, true);
        yield " badges enregistrés
        </span>
    </div>

    ";
        // line 15
        yield "    ";
        yield from $this->yieldParentBlock("page_actions", $context, $blocks);
        yield "
    
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "admin/badge_index.html.twig";
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
        return array (  81 => 15,  74 => 10,  70 => 8,  67 => 6,  57 => 5,  40 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# On hérite du template de base d'EasyAdmin #}
{% extends '@EasyAdmin/crud/index.html.twig' %}

{# On vient s'insérer dans le bloc \"page_actions\" (là où il y a les boutons) #}
{% block page_actions %}
    
    {# Notre petit compteur de badges #}
    <div class=\"d-flex align-items-center me-3\">
        <span class=\"badge bg-dark p-2 fs-6\">
            <i class=\"fas fa-id-badge me-2\"></i> {{ paginator.numResults }} badges enregistrés
        </span>
    </div>

    {# On affiche les boutons d'origine (Filtres, Créer) juste après #}
    {{ parent() }}
    
{% endblock %}", "admin/badge_index.html.twig", "/home/u607724417/domains/syndicopro.lamaisonducode.fr/public_html/templates/admin/badge_index.html.twig");
    }
}
