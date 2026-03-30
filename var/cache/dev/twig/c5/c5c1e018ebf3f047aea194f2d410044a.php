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

/* legal/index.html.twig */
class __TwigTemplate_f2270531b2e08fca61333302ee893862 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "legal/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "legal/index.html.twig"));

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

        yield "Mentions Légales & Confidentialité";
        
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
        yield "<div class=\"container mt-5 mb-5\">
    <h1 class=\"mb-4\">Mentions Légales & Protection des Données</h1>
    <hr>

    <section class=\"mt-4\">
        <h2>1. Édition du site</h2>
        <p>Ce site est un outil de gestion bénévole destiné exclusivement aux  copropriétés <strong></strong>.</p>
        <p><strong>Éditeur :</strong> Administrateur bénévole du site. Conformément à l'article 6-III-2 de la loi n° 2004-575 du 21 juin 2004 (LCEN), l'éditeur a choisi de rester anonyme. Ses coordonnées complètes ont été transmises à l'hébergeur du site.</p>
    </section>

    <section class=\"mt-4\">
        <h2>2. Hébergement</h2>
        <p>Le site est hébergé par :<br>
        <strong>Hostinger International Ltd.</strong><br>
        61 Lordou Vironos Street, 6023 Larnaca, Chypre<br>
        Site web : <a href=\"https://www.hostinger.fr\" target=\"_blank\">www.hostinger.fr</a></p>
    </section>

    <section class=\"mt-4\">
        <h2>3. Protection des données personnelles (RGPD)</h2>
        <p>Conformément au Règlement Général sur la Protection des Données (RGPD), les utilisateurs sont informés que :</p>
        <ul>
            <li><strong>Finalité :</strong> Les données collectées (Nom, Prénom, Email, Lot, Étages) servent uniquement à la gestion interne de la copropriété, au signalement des incidents et à la communication entre les résidents autorisés.</li>
            <li><strong>Lieu de stockage :</strong> Les données sont exclusivement hébergées sur des serveurs situés au sein de l'<strong>Union Européenne</strong> (France ou Lituanie selon l'infrastructure de l'hébergeur), garantissant un niveau de protection optimal.</li>
            <li><strong>Destinataires :</strong> Ces données sont accessibles uniquement aux membres habilités (Syndic, Conseil Syndical, Gardien). Aucune donnée n'est cédée ou vendue à des tiers.</li>
            <li><strong>Durée de conservation :</strong> Les données sont conservées tant que l'utilisateur est résident ou copropriétaire de l'immeuble.</li>
            <li><strong>Vos droits :</strong> Vous disposez d'un droit d'accès, de rectification et de suppression de vos données. Pour exercer ce droit, veuillez contacter l'administrateur par la messagerie interne ou par email.</li>
        </ul>
    </section>

    <section class=\"mt-4\">
        <h2>4. Responsabilité</h2>
        <p>L'éditeur s'efforce d'assurer la sécurité du site. Toutefois, s'agissant d'un outil de gestion bénévole, il ne saurait être tenu pour responsable en cas d'interruption de service ou d'erreur technique indépendante de sa volonté.</p>
    </section>
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
        return "legal/index.html.twig";
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
        return array (  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Mentions Légales & Confidentialité{% endblock %}

{% block body %}
<div class=\"container mt-5 mb-5\">
    <h1 class=\"mb-4\">Mentions Légales & Protection des Données</h1>
    <hr>

    <section class=\"mt-4\">
        <h2>1. Édition du site</h2>
        <p>Ce site est un outil de gestion bénévole destiné exclusivement aux  copropriétés <strong></strong>.</p>
        <p><strong>Éditeur :</strong> Administrateur bénévole du site. Conformément à l'article 6-III-2 de la loi n° 2004-575 du 21 juin 2004 (LCEN), l'éditeur a choisi de rester anonyme. Ses coordonnées complètes ont été transmises à l'hébergeur du site.</p>
    </section>

    <section class=\"mt-4\">
        <h2>2. Hébergement</h2>
        <p>Le site est hébergé par :<br>
        <strong>Hostinger International Ltd.</strong><br>
        61 Lordou Vironos Street, 6023 Larnaca, Chypre<br>
        Site web : <a href=\"https://www.hostinger.fr\" target=\"_blank\">www.hostinger.fr</a></p>
    </section>

    <section class=\"mt-4\">
        <h2>3. Protection des données personnelles (RGPD)</h2>
        <p>Conformément au Règlement Général sur la Protection des Données (RGPD), les utilisateurs sont informés que :</p>
        <ul>
            <li><strong>Finalité :</strong> Les données collectées (Nom, Prénom, Email, Lot, Étages) servent uniquement à la gestion interne de la copropriété, au signalement des incidents et à la communication entre les résidents autorisés.</li>
            <li><strong>Lieu de stockage :</strong> Les données sont exclusivement hébergées sur des serveurs situés au sein de l'<strong>Union Européenne</strong> (France ou Lituanie selon l'infrastructure de l'hébergeur), garantissant un niveau de protection optimal.</li>
            <li><strong>Destinataires :</strong> Ces données sont accessibles uniquement aux membres habilités (Syndic, Conseil Syndical, Gardien). Aucune donnée n'est cédée ou vendue à des tiers.</li>
            <li><strong>Durée de conservation :</strong> Les données sont conservées tant que l'utilisateur est résident ou copropriétaire de l'immeuble.</li>
            <li><strong>Vos droits :</strong> Vous disposez d'un droit d'accès, de rectification et de suppression de vos données. Pour exercer ce droit, veuillez contacter l'administrateur par la messagerie interne ou par email.</li>
        </ul>
    </section>

    <section class=\"mt-4\">
        <h2>4. Responsabilité</h2>
        <p>L'éditeur s'efforce d'assurer la sécurité du site. Toutefois, s'agissant d'un outil de gestion bénévole, il ne saurait être tenu pour responsable en cas d'interruption de service ou d'erreur technique indépendante de sa volonté.</p>
    </section>
</div>
{% endblock %}", "legal/index.html.twig", "C:\\laragon\\www\\syndicopro2\\templates\\legal\\index.html.twig");
    }
}
