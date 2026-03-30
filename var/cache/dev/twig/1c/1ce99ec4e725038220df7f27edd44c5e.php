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

/* home/index.html.twig */
class __TwigTemplate_579983e7aa5f6c58087700ec290c1108 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/index.html.twig"));

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

        yield "SyndicCopro | Accueil";
        
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

        // line 7
        yield "<style>
    .hero-section {
        background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1920&q=80');
        background-size: cover;
        background-position: center;
        color: white;
        padding: 120px 0;
        border-radius: 0 0 50px 50px;
    }
    .card-feature {
        transition: transform 0.3s;
        border: none;
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    .card-feature:hover { transform: translateY(-10px); }
</style>

<div class=\"hero-section text-center\">
    <div class=\"container\">
        <h1 class=\"display-3 fw-bold\">SyndicCopro</h1>
        <p class=\"lead mb-4\">La plateforme qui connecte Syndics, Gardiens et Copropriétaires.</p>
        ";
        // line 28
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 28, $this->source); })()), "user", [], "any", false, false, false, 28)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 29
            yield "            <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin");
            yield "\" class=\"btn btn-primary btn-lg px-5 shadow\">Mon Espace Client</a>
        ";
        } else {
            // line 31
            yield "            <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
            yield "\" class=\"btn btn-primary btn-lg px-5 shadow\">Se connecter</a>
        ";
        }
        // line 33
        yield "    </div>
</div>

<div class=\"container my-5\">
    <div class=\"row g-4\">
        <div class=\"col-md-4\">
            <div class=\"card card-feature h-100 p-4\">
                <div class=\"text-primary mb-3\"><i class=\"fas fa-shield-alt fa-3x\"></i></div>
                <h3>Sécurité</h3>
                <p>Accès sécurisé et filtrage des données par résidence pour une confidentialité totale.</p>
            </div>
        </div>
        <div class=\"col-md-4\">
            <div class=\"card card-feature h-100 p-4\">
                <div class=\"text-success mb-3\"><i class=\"fas fa-tools fa-3x\"></i></div>
                <h3>Interventions</h3>
                <p>Suivez en temps réel l'avancement des travaux et l'entretien de vos bâtiments.</p>
            </div>
        </div>
        <div class=\"col-md-4\">
            <div class=\"card card-feature h-100 p-4\">
                <div class=\"text-info mb-3\"><i class=\"fas fa-users fa-3x\"></i></div>
                <h3>Communauté</h3>
                <p>Facilitez les échanges entre le Conseil Syndical et le gestionnaire.</p>
            </div>
        </div>

        <div class=\"container-fluid py-5 text-center\">
            <h1 class=\"display-5 fw-bold\">🏢 Bienvenue sur SyndicCopro</h1>
            <p class=\"fs-4\">L'outil de gestion qui simplifie la vie de votre résidence.</p>
            <hr class=\"my-4\">
            ";
        // line 64
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 64, $this->source); })()), "user", [], "any", false, false, false, 64)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 65
            yield "                <p>Connecté en tant que : <strong>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 65, $this->source); })()), "user", [], "any", false, false, false, 65), "userIdentifier", [], "any", false, false, false, 65), "html", null, true);
            yield "</strong></p>
                <a href=\"";
            // line 66
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin");
            yield "\" class=\"btn btn-primary btn-lg\">Accéder au Dashboard</a>
            ";
        } else {
            // line 68
            yield "                <p>Veuillez vous identifier pour accéder à vos documents.</p>
                <a href=\"";
            // line 69
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
            yield "\" class=\"btn btn-outline-light btn-lg\">Se connecter</a>
            ";
        }
        // line 71
        yield "        </div>

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
        return "home/index.html.twig";
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
        return array (  190 => 71,  185 => 69,  182 => 68,  177 => 66,  172 => 65,  170 => 64,  137 => 33,  131 => 31,  125 => 29,  123 => 28,  100 => 7,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}SyndicCopro | Accueil{% endblock %}

{% block body %}
{# Un petit style interne pour booster le look #}
<style>
    .hero-section {
        background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1920&q=80');
        background-size: cover;
        background-position: center;
        color: white;
        padding: 120px 0;
        border-radius: 0 0 50px 50px;
    }
    .card-feature {
        transition: transform 0.3s;
        border: none;
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    .card-feature:hover { transform: translateY(-10px); }
</style>

<div class=\"hero-section text-center\">
    <div class=\"container\">
        <h1 class=\"display-3 fw-bold\">SyndicCopro</h1>
        <p class=\"lead mb-4\">La plateforme qui connecte Syndics, Gardiens et Copropriétaires.</p>
        {% if app.user %}
            <a href=\"{{ path('admin') }}\" class=\"btn btn-primary btn-lg px-5 shadow\">Mon Espace Client</a>
        {% else %}
            <a href=\"{{ path('app_login') }}\" class=\"btn btn-primary btn-lg px-5 shadow\">Se connecter</a>
        {% endif %}
    </div>
</div>

<div class=\"container my-5\">
    <div class=\"row g-4\">
        <div class=\"col-md-4\">
            <div class=\"card card-feature h-100 p-4\">
                <div class=\"text-primary mb-3\"><i class=\"fas fa-shield-alt fa-3x\"></i></div>
                <h3>Sécurité</h3>
                <p>Accès sécurisé et filtrage des données par résidence pour une confidentialité totale.</p>
            </div>
        </div>
        <div class=\"col-md-4\">
            <div class=\"card card-feature h-100 p-4\">
                <div class=\"text-success mb-3\"><i class=\"fas fa-tools fa-3x\"></i></div>
                <h3>Interventions</h3>
                <p>Suivez en temps réel l'avancement des travaux et l'entretien de vos bâtiments.</p>
            </div>
        </div>
        <div class=\"col-md-4\">
            <div class=\"card card-feature h-100 p-4\">
                <div class=\"text-info mb-3\"><i class=\"fas fa-users fa-3x\"></i></div>
                <h3>Communauté</h3>
                <p>Facilitez les échanges entre le Conseil Syndical et le gestionnaire.</p>
            </div>
        </div>

        <div class=\"container-fluid py-5 text-center\">
            <h1 class=\"display-5 fw-bold\">🏢 Bienvenue sur SyndicCopro</h1>
            <p class=\"fs-4\">L'outil de gestion qui simplifie la vie de votre résidence.</p>
            <hr class=\"my-4\">
            {% if app.user %}
                <p>Connecté en tant que : <strong>{{ app.user.userIdentifier }}</strong></p>
                <a href=\"{{ path('admin') }}\" class=\"btn btn-primary btn-lg\">Accéder au Dashboard</a>
            {% else %}
                <p>Veuillez vous identifier pour accéder à vos documents.</p>
                <a href=\"{{ path('app_login') }}\" class=\"btn btn-outline-light btn-lg\">Se connecter</a>
            {% endif %}
        </div>

    </div>
</div>
{% endblock %}
", "home/index.html.twig", "C:\\laragon\\www\\syndicopro2\\templates\\home\\index.html.twig");
    }
}
