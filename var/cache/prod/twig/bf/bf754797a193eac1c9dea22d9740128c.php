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

/* admin/fields/photos_detail.html.twig */
class __TwigTemplate_1a4f563df8d15bd93b8d140db24f7b81 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/fields/photos_detail.html.twig"));

        // line 2
        yield "<div class=\"d-flex flex-wrap gap-3\">
    ";
        // line 3
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["field"]) || array_key_exists("field", $context) ? $context["field"] : (function () { throw new RuntimeError('Variable "field" does not exist.', 3, $this->source); })()), "value", [], "any", false, false, false, 3));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["photo"]) {
            // line 4
            yield "        ";
            // line 5
            yield "        <a href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/menues_depenses/" . CoreExtension::getAttribute($this->env, $this->source, $context["photo"], "nomFichier", [], "any", false, false, false, 5))), "html", null, true);
            yield "\" target=\"_blank\" title=\"Cliquez pour agrandir\">
            <img src=\"";
            // line 6
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/menues_depenses/" . CoreExtension::getAttribute($this->env, $this->source, $context["photo"], "nomFichier", [], "any", false, false, false, 6))), "html", null, true);
            yield "\" 
                 alt=\"Justificatif\" 
                 class=\"img-thumbnail\"
                 style=\"max-height: 50px; object-fit: contain; cursor: zoom-in;\">
        </a>
    ";
            $context['_iterated'] = true;
        }
        // line 11
        if (!$context['_iterated']) {
            // line 12
            yield "        <span class=\"text-muted fst-italic\">Aucun justificatif fourni.</span>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['photo'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        yield "</div>";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "admin/fields/photos_detail.html.twig";
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
        return array (  79 => 14,  72 => 12,  70 => 11,  60 => 6,  55 => 5,  53 => 4,  48 => 3,  45 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# templates/admin/fields/photos_detail.html.twig #}
<div class=\"d-flex flex-wrap gap-3\">
    {% for photo in field.value %}
        {# On rend l'image cliquable pour l'ouvrir en grand dans un nouvel onglet #}
        <a href=\"{{ asset('uploads/menues_depenses/' ~ photo.nomFichier) }}\" target=\"_blank\" title=\"Cliquez pour agrandir\">
            <img src=\"{{ asset('uploads/menues_depenses/' ~ photo.nomFichier) }}\" 
                 alt=\"Justificatif\" 
                 class=\"img-thumbnail\"
                 style=\"max-height: 50px; object-fit: contain; cursor: zoom-in;\">
        </a>
    {% else %}
        <span class=\"text-muted fst-italic\">Aucun justificatif fourni.</span>
    {% endfor %}
</div>", "admin/fields/photos_detail.html.twig", "/home/u607724417/domains/syndicopro.lamaisonducode.fr/public_html/templates/admin/fields/photos_detail.html.twig");
    }
}
