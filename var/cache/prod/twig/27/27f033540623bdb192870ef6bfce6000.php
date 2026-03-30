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

/* security/login.html.twig */
class __TwigTemplate_ff742c63e283fbdbfd4951e8865bf41d extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "security/login.html.twig"));

        $this->parent = $this->load("base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Connexion - SyndicPro";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        yield "<div class=\"container\">
    <div class=\"row justify-content-center mb-5\">
        <div class=\"col-md-6 col-lg-4\">
            <div class=\"card shadow-lg border-0\">
                <div class=\"card-body p-5\">
                    <div class=\"text-center mb-4\">
                        <i class=\"fa fa-building-user fa-3x text-primary\"></i>
                        <h1 class=\"h3 mt-3 font-weight-normal\">SyndicPro</h1>
                        <p class=\"text-muted\">Accès à votre espace gestion</p>
                    </div>

                    <form method=\"post\">
                        ";
        // line 18
        if ((($tmp = (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 18, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 19
            yield "                            <div class=\"alert alert-danger shadow-sm border-0\">
                                <i class=\"fa fa-exclamation-triangle me-2\"></i> ";
            // line 20
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(CoreExtension::getAttribute($this->env, $this->source, (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 20, $this->source); })()), "messageKey", [], "any", false, false, false, 20), CoreExtension::getAttribute($this->env, $this->source, (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 20, $this->source); })()), "messageData", [], "any", false, false, false, 20), "security"), "html", null, true);
            yield "
                            </div>
                        ";
        }
        // line 23
        yield "
                        ";
        // line 24
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 24, $this->source); })()), "user", [], "any", false, false, false, 24)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 25
            yield "                            <div class=\"alert alert-info\">
                                Vous êtes déjà connecté en tant que <strong>";
            // line 26
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 26, $this->source); })()), "user", [], "any", false, false, false, 26), "userIdentifier", [], "any", false, false, false, 26), "html", null, true);
            yield "</strong>. 
                                <br><a href=\"";
            // line 27
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\LogoutUrlExtension']->getLogoutPath(), "html", null, true);
            yield "\" class=\"alert-link\">Se déconnecter</a>
                            </div>
                        ";
        }
        // line 30
        yield "
                        <div class=\"mb-3\">
                            <label for=\"inputEmail\" class=\"form-label\">Adresse Email</label>
                            <div class=\"input-group\">
                                <span class=\"input-group-text bg-light border-end-0\"><i class=\"fa fa-envelope text-muted\"></i></span>
                                <input type=\"email\" value=\"";
        // line 35
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["last_username"]) || array_key_exists("last_username", $context) ? $context["last_username"] : (function () { throw new RuntimeError('Variable "last_username" does not exist.', 35, $this->source); })()), "html", null, true);
        yield "\" name=\"email\" id=\"inputEmail\" class=\"form-control border-start-0 ps-0\" autocomplete=\"email\" required autofocus placeholder=\"nom@exemple.fr\">
                            </div>
                        </div>

                       <div class=\"mb-3\">
                            ";
        // line 41
        yield "                            <label for=\"inputPassword\" class=\"form-label text-dark\">Votre mot de passe</label>
                            <div class=\"input-group\">
                                <span class=\"input-group-text bg-light border-end-0\"><i class=\"fa fa-lock text-muted\"></i></span>
                                <input type=\"password\" name=\"password\" id=\"inputPassword\" class=\"form-control border-start-0 ps-0\" autocomplete=\"current-password\" required placeholder=\"Tapez votre mot de passe ici...\">
                            </div>
                        </div>

                        <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 48
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("authenticate"), "html", null, true);
        yield "\">

                        <div class=\"form-check mb-3\">
                            <input class=\"form-check-input\" type=\"checkbox\" name=\"_remember_me\" id=\"remember_me\">
                            <label class=\"form-check-label\" for=\"remember_me\">
                                Se souvenir de moi
                            </label>
                        </div>

                        <button class=\"btn btn-primary btn-lg w-100 shadow-sm mt-2\" type=\"submit\">
                            <i class=\"fa fa-sign-in-alt me-2\"></i> Connexion
                        </button>
                    </form>
                    
                    <div class=\"text-center mt-4\">
                        <hr class=\"text-muted\">
                        <p class=\"small text-muted mb-0\">Besoin d'un compte ?</p>
                        <a href=\"";
        // line 65
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_register");
        yield "\" class=\"text-primary text-decoration-none small\">Créer un accès copropriétaire/locataire</a>
                    </div>
                </div>
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
        return "security/login.html.twig";
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
        return array (  172 => 65,  152 => 48,  143 => 41,  135 => 35,  128 => 30,  122 => 27,  118 => 26,  115 => 25,  113 => 24,  110 => 23,  104 => 20,  101 => 19,  99 => 18,  85 => 6,  75 => 5,  58 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Connexion - SyndicPro{% endblock %}

{% block body %}
<div class=\"container\">
    <div class=\"row justify-content-center mb-5\">
        <div class=\"col-md-6 col-lg-4\">
            <div class=\"card shadow-lg border-0\">
                <div class=\"card-body p-5\">
                    <div class=\"text-center mb-4\">
                        <i class=\"fa fa-building-user fa-3x text-primary\"></i>
                        <h1 class=\"h3 mt-3 font-weight-normal\">SyndicPro</h1>
                        <p class=\"text-muted\">Accès à votre espace gestion</p>
                    </div>

                    <form method=\"post\">
                        {% if error %}
                            <div class=\"alert alert-danger shadow-sm border-0\">
                                <i class=\"fa fa-exclamation-triangle me-2\"></i> {{ error.messageKey|trans(error.messageData, 'security') }}
                            </div>
                        {% endif %}

                        {% if app.user %}
                            <div class=\"alert alert-info\">
                                Vous êtes déjà connecté en tant que <strong>{{ app.user.userIdentifier }}</strong>. 
                                <br><a href=\"{{ logout_path() }}\" class=\"alert-link\">Se déconnecter</a>
                            </div>
                        {% endif %}

                        <div class=\"mb-3\">
                            <label for=\"inputEmail\" class=\"form-label\">Adresse Email</label>
                            <div class=\"input-group\">
                                <span class=\"input-group-text bg-light border-end-0\"><i class=\"fa fa-envelope text-muted\"></i></span>
                                <input type=\"email\" value=\"{{ last_username }}\" name=\"email\" id=\"inputEmail\" class=\"form-control border-start-0 ps-0\" autocomplete=\"email\" required autofocus placeholder=\"nom@exemple.fr\">
                            </div>
                        </div>

                       <div class=\"mb-3\">
                            {# MODIFICATION ICI : Label et Placeholder #}
                            <label for=\"inputPassword\" class=\"form-label text-dark\">Votre mot de passe</label>
                            <div class=\"input-group\">
                                <span class=\"input-group-text bg-light border-end-0\"><i class=\"fa fa-lock text-muted\"></i></span>
                                <input type=\"password\" name=\"password\" id=\"inputPassword\" class=\"form-control border-start-0 ps-0\" autocomplete=\"current-password\" required placeholder=\"Tapez votre mot de passe ici...\">
                            </div>
                        </div>

                        <input type=\"hidden\" name=\"_csrf_token\" value=\"{{ csrf_token('authenticate') }}\">

                        <div class=\"form-check mb-3\">
                            <input class=\"form-check-input\" type=\"checkbox\" name=\"_remember_me\" id=\"remember_me\">
                            <label class=\"form-check-label\" for=\"remember_me\">
                                Se souvenir de moi
                            </label>
                        </div>

                        <button class=\"btn btn-primary btn-lg w-100 shadow-sm mt-2\" type=\"submit\">
                            <i class=\"fa fa-sign-in-alt me-2\"></i> Connexion
                        </button>
                    </form>
                    
                    <div class=\"text-center mt-4\">
                        <hr class=\"text-muted\">
                        <p class=\"small text-muted mb-0\">Besoin d'un compte ?</p>
                        <a href=\"{{ path('app_register') }}\" class=\"text-primary text-decoration-none small\">Créer un accès copropriétaire/locataire</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{% endblock %}
", "security/login.html.twig", "/home/u607724417/domains/syndicopro.lamaisonducode.fr/public_html/templates/security/login.html.twig");
    }
}
