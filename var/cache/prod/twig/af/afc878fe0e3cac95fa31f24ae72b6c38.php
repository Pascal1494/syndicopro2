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

/* _navbar.html.twig */
class __TwigTemplate_e431efdfd20c393239a2fb6972480687 extends Template
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

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "_navbar.html.twig"));

        // line 1
        yield "<nav class=\"navbar navbar-expand-lg navbar-dark bg-dark shadow-sm\">
    <div class=\"container\">
        <a class=\"navbar-brand\" href=\"";
        // line 3
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\">
            <i class=\"fa fa-city me-2 text-info\"></i><strong>SyndicPro</strong>
        </a>
        
        <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#mainNav\">
            <span class=\"navbar-toggler-icon\"></span>
        </button>

        <div class=\"collapse navbar-collapse\" id=\"mainNav\">
            <ul class=\"navbar-nav me-auto\">
                ";
        // line 13
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 13, $this->source); })()), "user", [], "any", false, false, false, 13)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 14
            yield "                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"";
            // line 15
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_resident_home");
            yield "\"><i class=\"fa fa-gauge me-1\"></i> Mes biens</a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"";
            // line 18
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_incident_new");
            yield "\"><i class=\"fa fa-triangle-exclamation me-1\"></i> Signalements</a>
                    </li>
                ";
        }
        // line 21
        yield "
                ";
        // line 23
        yield "                ";
        if (($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SYNDIC") || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_CONSEIL"))) {
            // line 24
            yield "                    <li class=\"nav-item dropdown\">
                        <a class=\"nav-link dropdown-toggle text-warning\" href=\"#\" data-bs-toggle=\"dropdown\">Gestion</a>
                        <ul class=\"dropdown-menu\">
                           ";
            // line 28
            yield "                           ";
            // line 29
            yield "                            <li><hr class=\"dropdown-divider\"></li>
                            <li><a class=\"dropdown-item\" href=\"";
            // line 30
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin");
            yield "\">Console EasyAdmin</a></li>
                        </ul>
                    </li>
                ";
        }
        // line 34
        yield "            </ul>

            <div class=\"navbar-nav ms-auto\">
                ";
        // line 37
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 37, $this->source); })()), "user", [], "any", false, false, false, 37)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 38
            yield "                    <div class=\"nav-item dropdown\">
                        <a class=\"nav-link dropdown-toggle\" href=\"#\" data-bs-toggle=\"dropdown\">
                            <i class=\"fa fa-user-circle me-1\"></i> ";
            // line 40
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 40, $this->source); })()), "user", [], "any", false, false, false, 40), "prenom", [], "any", false, false, false, 40), "html", null, true);
            yield "
                        </a>
                        <ul class=\"dropdown-menu dropdown-menu-end\">
                            <li><a class=\"dropdown-item\" href=\"";
            // line 43
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
            yield "\">Déconnexion</a></li>
                        </ul>
                    </div>
                ";
        } else {
            // line 47
            yield "                    <a class=\"nav-link\" href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
            yield "\">Connexion</a>
                ";
        }
        // line 49
        yield "            </div>
        </div>
    </div>
</nav>";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "_navbar.html.twig";
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
        return array (  132 => 49,  126 => 47,  119 => 43,  113 => 40,  109 => 38,  107 => 37,  102 => 34,  95 => 30,  92 => 29,  90 => 28,  85 => 24,  82 => 23,  79 => 21,  73 => 18,  67 => 15,  64 => 14,  62 => 13,  49 => 3,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<nav class=\"navbar navbar-expand-lg navbar-dark bg-dark shadow-sm\">
    <div class=\"container\">
        <a class=\"navbar-brand\" href=\"{{ path('app_home') }}\">
            <i class=\"fa fa-city me-2 text-info\"></i><strong>SyndicPro</strong>
        </a>
        
        <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#mainNav\">
            <span class=\"navbar-toggler-icon\"></span>
        </button>

        <div class=\"collapse navbar-collapse\" id=\"mainNav\">
            <ul class=\"navbar-nav me-auto\">
                {% if app.user %}
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"{{ path('app_resident_home') }}\"><i class=\"fa fa-gauge me-1\"></i> Mes biens</a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"{{ path('app_incident_new') }}\"><i class=\"fa fa-triangle-exclamation me-1\"></i> Signalements</a>
                    </li>
                {% endif %}

                {# Menu spécifique pour le Syndic et le Conseil Syndical #}
                {% if is_granted('ROLE_SYNDIC') or is_granted('ROLE_CONSEIL') %}
                    <li class=\"nav-item dropdown\">
                        <a class=\"nav-link dropdown-toggle text-warning\" href=\"#\" data-bs-toggle=\"dropdown\">Gestion</a>
                        <ul class=\"dropdown-menu\">
                           {# <li><a class=\"dropdown-item\" href=\"{{ path('app_copropriete_index') }}\">Copropriétés</a></li> #}
                           {# <li><a class=\"dropdown-item\" href=\"{{ path('app_syndic_details') }}\">Infos Syndic</a></li> #}
                            <li><hr class=\"dropdown-divider\"></li>
                            <li><a class=\"dropdown-item\" href=\"{{ path('admin') }}\">Console EasyAdmin</a></li>
                        </ul>
                    </li>
                {% endif %}
            </ul>

            <div class=\"navbar-nav ms-auto\">
                {% if app.user %}
                    <div class=\"nav-item dropdown\">
                        <a class=\"nav-link dropdown-toggle\" href=\"#\" data-bs-toggle=\"dropdown\">
                            <i class=\"fa fa-user-circle me-1\"></i> {{ app.user.prenom }}
                        </a>
                        <ul class=\"dropdown-menu dropdown-menu-end\">
                            <li><a class=\"dropdown-item\" href=\"{{ path('app_logout') }}\">Déconnexion</a></li>
                        </ul>
                    </div>
                {% else %}
                    <a class=\"nav-link\" href=\"{{ path('app_login') }}\">Connexion</a>
                {% endif %}
            </div>
        </div>
    </div>
</nav>", "_navbar.html.twig", "/home/u607724417/domains/syndicopro.lamaisonducode.fr/public_html/templates/_navbar.html.twig");
    }
}
