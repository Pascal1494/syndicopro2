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

/* admin/dashboard.html.twig */
class __TwigTemplate_f3c810b382e6acd5338f89a5a110bd62 extends Template
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
            'content_title' => [$this, 'block_content_title'],
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/dashboard.html.twig"));

        $this->parent = $this->load("@EasyAdmin/page/content.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content_title"));

        yield "Statistiques de la Copropriété";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 6
        yield "    <div class=\"container-fluid px-0\">
        
        ";
        // line 9
        yield "        ";
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["alertes_stock"]) || array_key_exists("alertes_stock", $context) ? $context["alertes_stock"] : (function () { throw new RuntimeError('Variable "alertes_stock" does not exist.', 9, $this->source); })())) > 0)) {
            // line 10
            yield "            <div class=\"alert alert-danger shadow mb-4\">
                <h4 class=\"alert-heading\"><i class=\"fas fa-exclamation-triangle\"></i> Alerte Stock de Badges !</h4>
                <p>Attention, vous devez recommander des badges pour les copropriétés suivantes :</p>
                <hr>
                <ul class=\"mb-0\">
                    ";
            // line 15
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["alertes_stock"]) || array_key_exists("alertes_stock", $context) ? $context["alertes_stock"] : (function () { throw new RuntimeError('Variable "alertes_stock" does not exist.', 15, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["stock"]) {
                // line 16
                yield "                        <li>
                            Copropriété <strong>";
                // line 17
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["stock"], "copropriete", [], "any", false, false, false, 17), "html", null, true);
                yield "</strong> (Couleur : <strong>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["stock"], "couleur", [], "any", false, false, false, 17), "html", null, true);
                yield "</strong>) : 
                            Il ne reste que <strong style=\"font-size: 1.2em;\">";
                // line 18
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["stock"], "quantite", [], "any", false, false, false, 18), "html", null, true);
                yield "</strong> 
                            ";
                // line 19
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["stock"], "quantite", [], "any", false, false, false, 19) > 1)) ? ("badges vierges") : ("badge vierge"));
                yield ".
                        </li>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['stock'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 22
            yield "                </ul>
            </div>
        ";
        }
        // line 25
        yield "
";
        // line 33
        yield "
        ";
        // line 35
        yield "        <div class=\"row g-3 mb-4\">
            ";
        // line 37
        yield "            <div class=\"col-sm-6 col-md-4 col-lg\">
                <div class=\"card bg-primary text-white shadow h-100 border-0\" style=\"background-image: linear-gradient(rgba(0,0,0,0.25), rgba(0,0,0,0.25));\">
                    <div class=\"card-body d-flex flex-column justify-content-center text-center py-3\">
                        <h6 class=\"text-uppercase small mb-2 opacity-75 fw-bold\">Résidents</h6>
                        <h2 class=\"display-6 fw-bold mb-0\">";
        // line 41
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["total_users"]) || array_key_exists("total_users", $context) ? $context["total_users"] : (function () { throw new RuntimeError('Variable "total_users" does not exist.', 41, $this->source); })()), "html", null, true);
        yield "</h2>
                        <i class=\"fa fa-users fa-2x opacity-50 mt-2\"></i>
                    </div>
                </div>
            </div>

            ";
        // line 48
        yield "            <div class=\"col-sm-6 col-md-4 col-lg\">
                <div class=\"card bg-success text-white shadow h-100 border-0\" style=\"background-image: linear-gradient(rgba(0,0,0,0.25), rgba(0,0,0,0.25));\">
                    <div class=\"card-body d-flex flex-column justify-content-center text-center py-3\">
                        <h6 class=\"text-uppercase small mb-2 opacity-75 fw-bold\">Bâtiments</h6>
                        <h2 class=\"display-6 fw-bold mb-0\">";
        // line 52
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["total_buildings"]) || array_key_exists("total_buildings", $context) ? $context["total_buildings"] : (function () { throw new RuntimeError('Variable "total_buildings" does not exist.', 52, $this->source); })()), "html", null, true);
        yield "</h2>
                        <i class=\"fa fa-building fa-2x opacity-50 mt-2\"></i>
                    </div>
                </div>
            </div>

            ";
        // line 59
        yield "            <div class=\"col-sm-6 col-md-4 col-lg\">
                <div class=\"card bg-info text-white shadow h-100 border-0\" style=\"background-image: linear-gradient(rgba(0,0,0,0.25), rgba(0,0,0,0.25));\">
                    <div class=\"card-body d-flex flex-column justify-content-center text-center py-3\">
                        <h6 class=\"text-uppercase small mb-2 opacity-75 fw-bold\">Lots</h6>
                        <h2 class=\"display-6 fw-bold mb-0\">";
        // line 63
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["total_lots"]) || array_key_exists("total_lots", $context) ? $context["total_lots"] : (function () { throw new RuntimeError('Variable "total_lots" does not exist.', 63, $this->source); })()), "html", null, true);
        yield "</h2>
                        <i class=\"fa fa-door-open fa-2x opacity-50 mt-2\"></i>
                    </div>
                </div>
            </div>

            ";
        // line 70
        yield "            <div class=\"col-sm-6 col-md-6 col-lg\">
                <div class=\"card bg-danger text-white shadow h-100 border-0\" style=\"background-image: linear-gradient(rgba(0,0,0,0.25), rgba(0,0,0,0.25));\">
                    <div class=\"card-body d-flex flex-column justify-content-center text-center py-3\">
                        <h6 class=\"text-uppercase small mb-2 opacity-75 fw-bold\">Copropriétés</h6>
                        <h2 class=\"display-6 fw-bold mb-0\">";
        // line 74
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["total_copropriete"]) || array_key_exists("total_copropriete", $context) ? $context["total_copropriete"] : (function () { throw new RuntimeError('Variable "total_copropriete" does not exist.', 74, $this->source); })()), "html", null, true);
        yield "</h2>
                        <i class=\"fa fa-building-user fa-2x opacity-50 mt-2\"></i>
                    </div>
                </div>
            </div>

            ";
        // line 81
        yield "            <div class=\"col-sm-12 col-md-6 col-lg\">
                <div class=\"card bg-warning text-white shadow h-100 border-0\" style=\"background-image: linear-gradient(rgba(0,0,0,0.35), rgba(0,0,0,0.35));\">
                    <div class=\"card-body d-flex flex-column justify-content-center text-center py-3\">
                        <h6 class=\"text-uppercase small mb-2 opacity-75 fw-bold\">Badges Actifs</h6>
                        <h2 class=\"display-6 fw-bold mb-0\">";
        // line 85
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["total_badges_actifs"]) || array_key_exists("total_badges_actifs", $context) ? $context["total_badges_actifs"] : (function () { throw new RuntimeError('Variable "total_badges_actifs" does not exist.', 85, $this->source); })()), "html", null, true);
        yield "</h2>
                        <i class=\"fa fa-id-badge fa-2x opacity-50 mt-2\"></i>
                    </div>
                </div>
            </div>
        </div>

   ";
        // line 93
        yield "    ";
        if ((($tmp =  !$this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SYNDIC")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 94
            yield "        <div class=\"row g-4 mb-4\">
            ";
            // line 96
            yield "            <div class=\"col-md-6\">
                <div class=\"card bg-dark text-white shadow h-100 border-0\" style=\"background-image: linear-gradient(rgba(0,0,0,0.25), rgba(0,0,0,0.25));\">
                    <div class=\"card-header border-bottom border-secondary d-flex align-items-center py-3\" style=\"background-color: transparent;\">
                        <i class=\"fa fa-address-book text-info fa-lg me-3\"></i>
                        <strong class=\"mb-0 fs-5\">Contacts Utiles</strong>
                    </div>
                    <div class=\"card-body p-0\">
                        <ul class=\"list-group list-group-flush\">
                            ";
            // line 105
            yield "                            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["syndics"]) || array_key_exists("syndics", $context) ? $context["syndics"] : (function () { throw new RuntimeError('Variable "syndics" does not exist.', 105, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["s"]) {
                // line 106
                yield "                                <li class=\"list-group-item bg-transparent text-white border-secondary py-3\">
                                    <div class=\"d-flex justify-content-between align-items-start\">
                                        <div>
                                            <h6 class=\"mb-1 fw-bold\">";
                // line 109
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["s"], "prenom", [], "any", false, false, false, 109), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["s"], "nom", [], "any", false, false, false, 109), "html", null, true);
                yield " <span class=\"badge bg-primary ms-2\">Syndic</span></h6>
                                            ";
                // line 110
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["s"], "email", [], "any", false, false, false, 110)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 111
                    yield "                                                <small class=\"d-block\">
                                                    <a href=\"mailto:";
                    // line 112
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["s"], "email", [], "any", false, false, false, 112), "html", null, true);
                    yield "\" class=\"text-white-50 text-decoration-none hover-text-white\">
                                                        <i class=\"fa fa-envelope me-1\"></i> ";
                    // line 113
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["s"], "email", [], "any", false, false, false, 113), "html", null, true);
                    yield "
                                                    </a>
                                                </small>
                                            ";
                }
                // line 117
                yield "                                        </div>
                                    </div>
                                </li>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['s'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 121
            yield "
                            ";
            // line 123
            yield "                            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["membres_cs"]) || array_key_exists("membres_cs", $context) ? $context["membres_cs"] : (function () { throw new RuntimeError('Variable "membres_cs" does not exist.', 123, $this->source); })()));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["_key"] => $context["cs"]) {
                // line 124
                yield "                                <li class=\"list-group-item bg-transparent text-white border-secondary py-3\">
                                    <div class=\"d-flex justify-content-between align-items-start\">
                                        <div>
                                            <h6 class=\"mb-1 fw-bold\">";
                // line 127
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["cs"], "prenom", [], "any", false, false, false, 127), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["cs"], "nom", [], "any", false, false, false, 127), "html", null, true);
                yield " <span class=\"badge bg-info text-dark ms-2\">Conseil Syndical</span></h6>
                                            ";
                // line 128
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["cs"], "email", [], "any", false, false, false, 128)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 129
                    yield "                                                <small class=\"d-block\">
                                                    <a href=\"mailto:";
                    // line 130
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["cs"], "email", [], "any", false, false, false, 130), "html", null, true);
                    yield "\" class=\"text-white-50 text-decoration-none hover-text-white\">
                                                        <i class=\"fa fa-envelope me-1\"></i> ";
                    // line 131
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["cs"], "email", [], "any", false, false, false, 131), "html", null, true);
                    yield "
                                                    </a>
                                                </small>
                                            ";
                }
                // line 135
                yield "                                        </div>
                                    </div>
                                </li>
                            ";
                $context['_iterated'] = true;
            }
            // line 138
            if (!$context['_iterated']) {
                // line 139
                yield "                                <li class=\"list-group-item bg-transparent text-white-50 border-secondary py-3 small fst-italic\">Aucun membre du conseil syndical renseigné.</li>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['cs'], $context['_parent'], $context['_iterated']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 141
            yield "                        </ul>
                    </div>
                </div>
            </div>

            ";
            // line 147
            yield "            <div class=\"col-md-6\">
                <div class=\"card bg-dark text-white shadow h-100 border-0\" style=\"background-image: linear-gradient(rgba(0,0,0,0.25), rgba(0,0,0,0.25));\">
                    <div class=\"card-header border-bottom border-secondary d-flex align-items-center py-3\" style=\"background-color: transparent;\">
                        <i class=\"fa fa-tools text-warning fa-lg me-3\"></i>
                        <strong class=\"mb-0 fs-5\">Entreprises / Prestataires</strong>
                    </div>
                    <div class=\"card-body p-0\">
                        <ul class=\"list-group list-group-flush\">
                            ";
            // line 155
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["prestataires"]) || array_key_exists("prestataires", $context) ? $context["prestataires"] : (function () { throw new RuntimeError('Variable "prestataires" does not exist.', 155, $this->source); })()));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["_key"] => $context["presta"]) {
                // line 156
                yield "                                <li class=\"list-group-item bg-transparent text-white border-secondary py-3\">
                                    <h6 class=\"mb-1 fw-bold\">";
                // line 157
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["presta"], "nom", [], "any", false, false, false, 157), "html", null, true);
                yield " <span class=\"badge bg-light text-dark ms-2\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["presta"], "domaine", [], "any", false, false, false, 157), "html", null, true);
                yield "</span></h6>
                                    <div class=\"text-white-50 small mt-2\">
                                        ";
                // line 159
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["presta"], "telephone", [], "any", false, false, false, 159)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 160
                    yield "                                            <span class=\"me-3 d-inline-block\">
                                                <a href=\"tel:";
                    // line 161
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["presta"], "telephone", [], "any", false, false, false, 161), "html", null, true);
                    yield "\" class=\"text-white-50 text-decoration-none\">
                                                    <i class=\"fa fa-phone me-1\"></i> ";
                    // line 162
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["presta"], "telephone", [], "any", false, false, false, 162), "html", null, true);
                    yield "
                                                </a>
                                            </span>
                                        ";
                }
                // line 166
                yield "                                        ";
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["presta"], "email", [], "any", false, false, false, 166)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 167
                    yield "                                            <span class=\"d-inline-block\">
                                                <a href=\"mailto:";
                    // line 168
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["presta"], "email", [], "any", false, false, false, 168), "html", null, true);
                    yield "\" class=\"text-white-50 text-decoration-none\">
                                                    <i class=\"fa fa-envelope me-1\"></i> ";
                    // line 169
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["presta"], "email", [], "any", false, false, false, 169), "html", null, true);
                    yield "
                                                </a>
                                            </span>
                                        ";
                }
                // line 173
                yield "                                    </div>
                                </li>
                            ";
                $context['_iterated'] = true;
            }
            // line 175
            if (!$context['_iterated']) {
                // line 176
                yield "                                <li class=\"list-group-item bg-transparent text-white-50 border-secondary py-3 small fst-italic\">Aucun prestataire associé à cette copropriété pour le moment.</li>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['presta'], $context['_parent'], $context['_iterated']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 178
            yield "                        </ul>
                    </div>
                </div>
            </div>
        </div>
    ";
        }
        // line 184
        yield "
   ";
        // line 185
        if ((array_key_exists("gardiens", $context) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["gardiens"]) || array_key_exists("gardiens", $context) ? $context["gardiens"] : (function () { throw new RuntimeError('Variable "gardiens" does not exist.', 185, $this->source); })())) > 0))) {
            // line 186
            yield "    <div class=\"card mb-4 shadow-sm border-0\">
        <div class=\"card-header bg-dark text-white\">
            <h5 class=\"mb-0\"><i class=\"fas fa-user-shield me-2\"></i> Gardien de la Résidence</h5>
        </div>
        <div class=\"card-body\">
            ";
            // line 191
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["gardiens"]) || array_key_exists("gardiens", $context) ? $context["gardiens"] : (function () { throw new RuntimeError('Variable "gardiens" does not exist.', 191, $this->source); })()));
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
            foreach ($context['_seq'] as $context["_key"] => $context["gardien"]) {
                // line 192
                yield "                <div class=\"d-flex align-items-start ";
                if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 192)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield "mb-3 pb-3 border-bottom";
                }
                yield "\">
                    
                     ";
                // line 195
                yield "                   ";
                // line 202
                yield " 
                    
                    ";
                // line 205
                yield "                    <div class=\"w-100\">
                        <h6 class=\"mb-1 fw-bold\">";
                // line 206
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["gardien"], "prenom", [], "any", false, false, false, 206), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["gardien"], "nom", [], "any", false, false, false, 206), "html", null, true);
                yield "</h6>
                        
                        ";
                // line 209
                yield "                        <div class=\"text-muted small mb-1\">
                            <i class=\"fas fa-envelope me-2 text-info\"></i> 
                            <a href=\"mailto:";
                // line 211
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["gardien"], "email", [], "any", false, false, false, 211), "html", null, true);
                yield "\" class=\"text-decoration-none text-muted\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["gardien"], "email", [], "any", false, false, false, 211), "html", null, true);
                yield "</a>
                        </div>
                        
                        ";
                // line 215
                yield "                        ";
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["gardien"], "telephone", [], "any", false, false, false, 215)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 216
                    yield "                            <div class=\"text-muted small mb-2\">
                                <i class=\"fas fa-phone me-2 text-info\"></i> 
                                <a href=\"tel:";
                    // line 218
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["gardien"], "telephone", [], "any", false, false, false, 218), "html", null, true);
                    yield "\" class=\"text-decoration-none text-muted\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["gardien"], "telephone", [], "any", false, false, false, 218), "html", null, true);
                    yield "</a>
                            </div>
                        ";
                }
                // line 221
                yield "
                        ";
                // line 223
                yield "                        ";
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["gardien"], "horairesGardien", [], "any", false, false, false, 223)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 224
                    yield "                            <div class=\"mt-2 p-2 bg-light rounded border border-light text-muted small\">
                                <i class=\"fas fa-clock me-1 text-warning\"></i> 
                                <strong>Horaires de présence :</strong><br>
                                <span class=\"ms-4\">";
                    // line 227
                    yield Twig\Extension\CoreExtension::nl2br($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["gardien"], "horairesGardien", [], "any", false, false, false, 227), "html", null, true));
                    yield "</span>
                            </div>
                        ";
                }
                // line 230
                yield "                    </div>
                    
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
            unset($context['_seq'], $context['_key'], $context['gardien'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 234
            yield "        </div>
    </div>
";
        }
        // line 237
        yield "
    ";
        // line 239
        yield "    <div class=\"row mb-4\">
        <div class=\"col-12\">
            <a href=\"";
        // line 241
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["url_incidents"]) || array_key_exists("url_incidents", $context) ? $context["url_incidents"] : (function () { throw new RuntimeError('Variable "url_incidents" does not exist.', 241, $this->source); })()), "html", null, true);
        yield "\" class=\"text-decoration-none\">
                <div class=\"card shadow border-0 overflow-hidden\" style=\"background: linear-gradient(90deg, #6610f2 0%, #6f42c1 100%); transition: transform 0.2s;\">
                    <div class=\"card-body d-flex align-items-center justify-content-between py-4 px-5 text-white\">
                        <div class=\"d-flex align-items-center\">
                            <div class=\"rounded-circle bg-white bg-opacity-25 p-3 me-4\">
                                <i class=\"fa fa-exclamation-triangle fa-2x\"></i>
                            </div>
                            <div>
                                <h4 class=\"mb-0 fw-bold\">Signalaments d'incidents</h4>
                                <p class=\"mb-0 opacity-75\">
                                    ";
        // line 251
        if (((isset($context["total_nouveaux_incidents"]) || array_key_exists("total_nouveaux_incidents", $context) ? $context["total_nouveaux_incidents"] : (function () { throw new RuntimeError('Variable "total_nouveaux_incidents" does not exist.', 251, $this->source); })()) > 0)) {
            // line 252
            yield "                                        Il y a <strong>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["total_nouveaux_incidents"]) || array_key_exists("total_nouveaux_incidents", $context) ? $context["total_nouveaux_incidents"] : (function () { throw new RuntimeError('Variable "total_nouveaux_incidents" does not exist.', 252, $this->source); })()), "html", null, true);
            yield "</strong> nouveau";
            yield ((((isset($context["total_nouveaux_incidents"]) || array_key_exists("total_nouveaux_incidents", $context) ? $context["total_nouveaux_incidents"] : (function () { throw new RuntimeError('Variable "total_nouveaux_incidents" does not exist.', 252, $this->source); })()) > 1)) ? ("x") : (""));
            yield " incident";
            yield ((((isset($context["total_nouveaux_incidents"]) || array_key_exists("total_nouveaux_incidents", $context) ? $context["total_nouveaux_incidents"] : (function () { throw new RuntimeError('Variable "total_nouveaux_incidents" does not exist.', 252, $this->source); })()) > 1)) ? ("s") : (""));
            yield " à traiter dans votre copropriété.
                                    ";
        } else {
            // line 254
            yield "                                        Aucun nouvel incident non traité. Tout est en ordre !
                                    ";
        }
        // line 256
        yield "                                </p>
                            </div>
                        </div>
                        <div class=\"text-end d-none d-md-block\">
                            <span class=\"btn btn-outline-light btn-sm rounded-pill px-4\">
                                Voir les détails <i class=\"fa fa-arrow-right ms-2\"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

        ";
        // line 271
        yield "        <div class=\"card shadow\">
            <div class=\"card-header bg-light d-flex justify-content-between align-items-center\">
                <strong><i class=\"fa fa-history text-secondary me-2\"></i> Derniers badges enregistrés</strong>
                <span class=\"badge bg-secondary\">Les 5 derniers</span>
            </div>
            
            <div class=\"card-body p-0\">
                <div class=\"table-responsive\">
                    <table class=\"table table-hover align-middle mb-0\">
                        <thead class=\"table-light\">
                            <tr>
                                <th class=\"ps-4\">N° Hexa</th>
                                <th>Statut</th>
                                <th>Date d'activation</th>
                                <th>Lot Rattaché</th>
                                <th>Remplacement</th>
                            </tr>
                        </thead>
                        <tbody>
                            ";
        // line 290
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["derniers_badges"]) || array_key_exists("derniers_badges", $context) ? $context["derniers_badges"] : (function () { throw new RuntimeError('Variable "derniers_badges" does not exist.', 290, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["badge"]) {
            // line 291
            yield "                                <tr>
                                    <td class=\"ps-4 fw-bold\">";
            // line 292
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["badge"], "numeroHexa", [], "any", false, false, false, 292), "html", null, true);
            yield "</td>
                                    <td>
                                        ";
            // line 294
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["badge"], "status", [], "any", false, false, false, 294) == "actif")) {
                // line 295
                yield "                                            <span class=\"badge bg-success\">Actif</span>
                                        ";
            } elseif (((CoreExtension::getAttribute($this->env, $this->source,             // line 296
$context["badge"], "status", [], "any", false, false, false, 296) == "perdu") || (CoreExtension::getAttribute($this->env, $this->source, $context["badge"], "status", [], "any", false, false, false, 296) == "Vol"))) {
                // line 297
                yield "                                            <span class=\"badge bg-danger\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["badge"], "status", [], "any", false, false, false, 297)), "html", null, true);
                yield "</span>
                                        ";
            } else {
                // line 299
                yield "                                            <span class=\"badge bg-secondary\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["badge"], "status", [], "any", false, false, false, 299)), "html", null, true);
                yield "</span>
                                        ";
            }
            // line 301
            yield "                                    </td>
                                    <td>";
            // line 302
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["badge"], "dateActivation", [], "any", false, false, false, 302)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["badge"], "dateActivation", [], "any", false, false, false, 302), "d/m/Y"), "html", null, true)) : ("-"));
            yield "</td>
                                    <td>";
            // line 303
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["badge"], "lot", [], "any", false, false, false, 303)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["badge"], "lot", [], "any", false, false, false, 303), "html", null, true)) : ("-"));
            yield "</td>
                                    <td>
                                        ";
            // line 305
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["badge"], "remplacebadge", [], "any", false, false, false, 305)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 306
                yield "                                            <span class=\"text-muted\" title=\"Remplace le n°";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["badge"], "remplacebadge", [], "any", false, false, false, 306), "numeroHexa", [], "any", false, false, false, 306), "html", null, true);
                yield "\">
                                                <i class=\"fa fa-exchange-alt\"></i> Oui
                                            </span>
                                        ";
            } else {
                // line 310
                yield "                                            -
                                        ";
            }
            // line 312
            yield "                                    </td>
                                </tr>
                            ";
            $context['_iterated'] = true;
        }
        // line 314
        if (!$context['_iterated']) {
            // line 315
            yield "                                <tr>
                                    <td colspan=\"5\" class=\"text-center py-4 text-muted\">Aucun badge enregistré pour le moment.</td>
                                </tr>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['badge'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 319
        yield "                        </tbody>
                    </table>
                </div>
            </div>
            <div class=\"card-footer bg-light text-muted small text-center\">
                <i class=\"fa fa-info-circle me-1\"></i> En cas de remplacement d'un badge par un nouveau, veuillez sélectionner le badge perdu et cliquer sur le bouton \"Remplacer\".
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
        return "admin/dashboard.html.twig";
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
        return array (  679 => 319,  670 => 315,  668 => 314,  662 => 312,  658 => 310,  650 => 306,  648 => 305,  643 => 303,  639 => 302,  636 => 301,  630 => 299,  624 => 297,  622 => 296,  619 => 295,  617 => 294,  612 => 292,  609 => 291,  604 => 290,  583 => 271,  567 => 256,  563 => 254,  553 => 252,  551 => 251,  538 => 241,  534 => 239,  531 => 237,  526 => 234,  509 => 230,  503 => 227,  498 => 224,  495 => 223,  492 => 221,  484 => 218,  480 => 216,  477 => 215,  469 => 211,  465 => 209,  458 => 206,  455 => 205,  451 => 202,  449 => 195,  441 => 192,  424 => 191,  417 => 186,  415 => 185,  412 => 184,  404 => 178,  397 => 176,  395 => 175,  389 => 173,  382 => 169,  378 => 168,  375 => 167,  372 => 166,  365 => 162,  361 => 161,  358 => 160,  356 => 159,  349 => 157,  346 => 156,  341 => 155,  331 => 147,  324 => 141,  317 => 139,  315 => 138,  308 => 135,  301 => 131,  297 => 130,  294 => 129,  292 => 128,  286 => 127,  281 => 124,  275 => 123,  272 => 121,  263 => 117,  256 => 113,  252 => 112,  249 => 111,  247 => 110,  241 => 109,  236 => 106,  231 => 105,  221 => 96,  218 => 94,  215 => 93,  205 => 85,  199 => 81,  190 => 74,  184 => 70,  175 => 63,  169 => 59,  160 => 52,  154 => 48,  145 => 41,  139 => 37,  136 => 35,  133 => 33,  130 => 25,  125 => 22,  116 => 19,  112 => 18,  106 => 17,  103 => 16,  99 => 15,  92 => 10,  89 => 9,  85 => 6,  75 => 5,  58 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends '@EasyAdmin/page/content.html.twig' %}

{% block content_title %}Statistiques de la Copropriété{% endblock %}

{% block content %}
    <div class=\"container-fluid px-0\">
        
        {# --- 1. LE BLOC D'ALERTE (Totalement séparé du reste) --- #}
        {% if alertes_stock|length > 0 %}
            <div class=\"alert alert-danger shadow mb-4\">
                <h4 class=\"alert-heading\"><i class=\"fas fa-exclamation-triangle\"></i> Alerte Stock de Badges !</h4>
                <p>Attention, vous devez recommander des badges pour les copropriétés suivantes :</p>
                <hr>
                <ul class=\"mb-0\">
                    {% for stock in alertes_stock %}
                        <li>
                            Copropriété <strong>{{ stock.copropriete }}</strong> (Couleur : <strong>{{ stock.couleur }}</strong>) : 
                            Il ne reste que <strong style=\"font-size: 1.2em;\">{{ stock.quantite }}</strong> 
                            {{ stock.quantite > 1 ? 'badges vierges' : 'badge vierge' }}.
                        </li>
                    {% endfor %}
                </ul>
            </div>
        {% endif %}

{#        <div class=\"card p-4 mb-4 shadow-sm\">#}
{#    <h4 class=\"mb-3\">🔍 Recherche Globale</h4>#}
{#    <form action=\"{{ path('admin') }}\" method=\"GET\" class=\"d-flex\">#}
{#        <input type=\"search\" name=\"q\" class=\"form-control form-control-lg me-2\" placeholder=\"Taper un nom, locataire, 0685..., ou numéro de badge...\">#}
{#        <button type=\"submit\" class=\"btn btn-primary btn-lg\">Chercher partout</button>#}
{#    </form>#}
{#</div>#}

        {# --- 2. LA GRILLE DES 5 CARTES (Avec le filtre sombre) --- #}
        <div class=\"row g-3 mb-4\">
            {# Carte 1 : Résidents #}
            <div class=\"col-sm-6 col-md-4 col-lg\">
                <div class=\"card bg-primary text-white shadow h-100 border-0\" style=\"background-image: linear-gradient(rgba(0,0,0,0.25), rgba(0,0,0,0.25));\">
                    <div class=\"card-body d-flex flex-column justify-content-center text-center py-3\">
                        <h6 class=\"text-uppercase small mb-2 opacity-75 fw-bold\">Résidents</h6>
                        <h2 class=\"display-6 fw-bold mb-0\">{{ total_users }}</h2>
                        <i class=\"fa fa-users fa-2x opacity-50 mt-2\"></i>
                    </div>
                </div>
            </div>

            {# Carte 2 : Bâtiments #}
            <div class=\"col-sm-6 col-md-4 col-lg\">
                <div class=\"card bg-success text-white shadow h-100 border-0\" style=\"background-image: linear-gradient(rgba(0,0,0,0.25), rgba(0,0,0,0.25));\">
                    <div class=\"card-body d-flex flex-column justify-content-center text-center py-3\">
                        <h6 class=\"text-uppercase small mb-2 opacity-75 fw-bold\">Bâtiments</h6>
                        <h2 class=\"display-6 fw-bold mb-0\">{{ total_buildings }}</h2>
                        <i class=\"fa fa-building fa-2x opacity-50 mt-2\"></i>
                    </div>
                </div>
            </div>

            {# Carte 3 : Lots #}
            <div class=\"col-sm-6 col-md-4 col-lg\">
                <div class=\"card bg-info text-white shadow h-100 border-0\" style=\"background-image: linear-gradient(rgba(0,0,0,0.25), rgba(0,0,0,0.25));\">
                    <div class=\"card-body d-flex flex-column justify-content-center text-center py-3\">
                        <h6 class=\"text-uppercase small mb-2 opacity-75 fw-bold\">Lots</h6>
                        <h2 class=\"display-6 fw-bold mb-0\">{{ total_lots }}</h2>
                        <i class=\"fa fa-door-open fa-2x opacity-50 mt-2\"></i>
                    </div>
                </div>
            </div>

            {# Carte 4 : Copropriétés #}
            <div class=\"col-sm-6 col-md-6 col-lg\">
                <div class=\"card bg-danger text-white shadow h-100 border-0\" style=\"background-image: linear-gradient(rgba(0,0,0,0.25), rgba(0,0,0,0.25));\">
                    <div class=\"card-body d-flex flex-column justify-content-center text-center py-3\">
                        <h6 class=\"text-uppercase small mb-2 opacity-75 fw-bold\">Copropriétés</h6>
                        <h2 class=\"display-6 fw-bold mb-0\">{{ total_copropriete }}</h2>
                        <i class=\"fa fa-building-user fa-2x opacity-50 mt-2\"></i>
                    </div>
                </div>
            </div>

            {# Carte 5 : Badges Actifs #}
            <div class=\"col-sm-12 col-md-6 col-lg\">
                <div class=\"card bg-warning text-white shadow h-100 border-0\" style=\"background-image: linear-gradient(rgba(0,0,0,0.35), rgba(0,0,0,0.35));\">
                    <div class=\"card-body d-flex flex-column justify-content-center text-center py-3\">
                        <h6 class=\"text-uppercase small mb-2 opacity-75 fw-bold\">Badges Actifs</h6>
                        <h2 class=\"display-6 fw-bold mb-0\">{{ total_badges_actifs }}</h2>
                        <i class=\"fa fa-id-badge fa-2x opacity-50 mt-2\"></i>
                    </div>
                </div>
            </div>
        </div>

   {# ✨ SECTION : ANNUAIRE (Visible uniquement si NON Syndic pour le moment) #}
    {% if not is_granted('ROLE_SYNDIC') %}
        <div class=\"row g-4 mb-4\">
            {# 📇 Carte 1 : Les Contacts Utiles #}
            <div class=\"col-md-6\">
                <div class=\"card bg-dark text-white shadow h-100 border-0\" style=\"background-image: linear-gradient(rgba(0,0,0,0.25), rgba(0,0,0,0.25));\">
                    <div class=\"card-header border-bottom border-secondary d-flex align-items-center py-3\" style=\"background-color: transparent;\">
                        <i class=\"fa fa-address-book text-info fa-lg me-3\"></i>
                        <strong class=\"mb-0 fs-5\">Contacts Utiles</strong>
                    </div>
                    <div class=\"card-body p-0\">
                        <ul class=\"list-group list-group-flush\">
                            {# Affichage du Syndic #}
                            {% for s in syndics %}
                                <li class=\"list-group-item bg-transparent text-white border-secondary py-3\">
                                    <div class=\"d-flex justify-content-between align-items-start\">
                                        <div>
                                            <h6 class=\"mb-1 fw-bold\">{{ s.prenom }} {{ s.nom }} <span class=\"badge bg-primary ms-2\">Syndic</span></h6>
                                            {% if s.email %}
                                                <small class=\"d-block\">
                                                    <a href=\"mailto:{{ s.email }}\" class=\"text-white-50 text-decoration-none hover-text-white\">
                                                        <i class=\"fa fa-envelope me-1\"></i> {{ s.email }}
                                                    </a>
                                                </small>
                                            {% endif %}
                                        </div>
                                    </div>
                                </li>
                            {% endfor %}

                            {# Affichage des membres du CS #}
                            {% for cs in membres_cs %}
                                <li class=\"list-group-item bg-transparent text-white border-secondary py-3\">
                                    <div class=\"d-flex justify-content-between align-items-start\">
                                        <div>
                                            <h6 class=\"mb-1 fw-bold\">{{ cs.prenom }} {{ cs.nom }} <span class=\"badge bg-info text-dark ms-2\">Conseil Syndical</span></h6>
                                            {% if cs.email %}
                                                <small class=\"d-block\">
                                                    <a href=\"mailto:{{ cs.email }}\" class=\"text-white-50 text-decoration-none hover-text-white\">
                                                        <i class=\"fa fa-envelope me-1\"></i> {{ cs.email }}
                                                    </a>
                                                </small>
                                            {% endif %}
                                        </div>
                                    </div>
                                </li>
                            {% else %}
                                <li class=\"list-group-item bg-transparent text-white-50 border-secondary py-3 small fst-italic\">Aucun membre du conseil syndical renseigné.</li>
                            {% endfor %}
                        </ul>
                    </div>
                </div>
            </div>

            {# 🛠️ Carte 2 : Les Prestataires #}
            <div class=\"col-md-6\">
                <div class=\"card bg-dark text-white shadow h-100 border-0\" style=\"background-image: linear-gradient(rgba(0,0,0,0.25), rgba(0,0,0,0.25));\">
                    <div class=\"card-header border-bottom border-secondary d-flex align-items-center py-3\" style=\"background-color: transparent;\">
                        <i class=\"fa fa-tools text-warning fa-lg me-3\"></i>
                        <strong class=\"mb-0 fs-5\">Entreprises / Prestataires</strong>
                    </div>
                    <div class=\"card-body p-0\">
                        <ul class=\"list-group list-group-flush\">
                            {% for presta in prestataires %}
                                <li class=\"list-group-item bg-transparent text-white border-secondary py-3\">
                                    <h6 class=\"mb-1 fw-bold\">{{ presta.nom }} <span class=\"badge bg-light text-dark ms-2\">{{ presta.domaine }}</span></h6>
                                    <div class=\"text-white-50 small mt-2\">
                                        {% if presta.telephone %}
                                            <span class=\"me-3 d-inline-block\">
                                                <a href=\"tel:{{ presta.telephone }}\" class=\"text-white-50 text-decoration-none\">
                                                    <i class=\"fa fa-phone me-1\"></i> {{ presta.telephone }}
                                                </a>
                                            </span>
                                        {% endif %}
                                        {% if presta.email %}
                                            <span class=\"d-inline-block\">
                                                <a href=\"mailto:{{ presta.email }}\" class=\"text-white-50 text-decoration-none\">
                                                    <i class=\"fa fa-envelope me-1\"></i> {{ presta.email }}
                                                </a>
                                            </span>
                                        {% endif %}
                                    </div>
                                </li>
                            {% else %}
                                <li class=\"list-group-item bg-transparent text-white-50 border-secondary py-3 small fst-italic\">Aucun prestataire associé à cette copropriété pour le moment.</li>
                            {% endfor %}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    {% endif %}

   {% if gardiens is defined and gardiens|length > 0 %}
    <div class=\"card mb-4 shadow-sm border-0\">
        <div class=\"card-header bg-dark text-white\">
            <h5 class=\"mb-0\"><i class=\"fas fa-user-shield me-2\"></i> Gardien de la Résidence</h5>
        </div>
        <div class=\"card-body\">
            {% for gardien in gardiens %}
                <div class=\"d-flex align-items-start {% if not loop.last %}mb-3 pb-3 border-bottom{% endif %}\">
                    
                     {# Icône avatar #}
                   {#
                       <div class=\"me-3 mt-1\">
                           <div class=\"bg-light rounded-circle d-flex align-items-center justify-content-center\" style=\"width: 50px; height: 50px;\">
                               <i class=\"fas fa-user text-secondary fs-4\"></i>
                           </div>
                       </div> 
                   
                    #} 
                    
                    {# Informations du gardien #}
                    <div class=\"w-100\">
                        <h6 class=\"mb-1 fw-bold\">{{ gardien.prenom }} {{ gardien.nom }}</h6>
                        
                        {# Email #}
                        <div class=\"text-muted small mb-1\">
                            <i class=\"fas fa-envelope me-2 text-info\"></i> 
                            <a href=\"mailto:{{ gardien.email }}\" class=\"text-decoration-none text-muted\">{{ gardien.email }}</a>
                        </div>
                        
                        {# ✨ LE TÉLÉPHONE #}
                        {% if gardien.telephone %}
                            <div class=\"text-muted small mb-2\">
                                <i class=\"fas fa-phone me-2 text-info\"></i> 
                                <a href=\"tel:{{ gardien.telephone }}\" class=\"text-decoration-none text-muted\">{{ gardien.telephone }}</a>
                            </div>
                        {% endif %}

                        {# ✨ LES HORAIRES #}
                        {% if gardien.horairesGardien %}
                            <div class=\"mt-2 p-2 bg-light rounded border border-light text-muted small\">
                                <i class=\"fas fa-clock me-1 text-warning\"></i> 
                                <strong>Horaires de présence :</strong><br>
                                <span class=\"ms-4\">{{ gardien.horairesGardien|nl2br }}</span>
                            </div>
                        {% endif %}
                    </div>
                    
                </div>
            {% endfor %}
        </div>
    </div>
{% endif %}

    {# ✨ CARTE INCIDENTS TOUTE SEULE #}
    <div class=\"row mb-4\">
        <div class=\"col-12\">
            <a href=\"{{ url_incidents }}\" class=\"text-decoration-none\">
                <div class=\"card shadow border-0 overflow-hidden\" style=\"background: linear-gradient(90deg, #6610f2 0%, #6f42c1 100%); transition: transform 0.2s;\">
                    <div class=\"card-body d-flex align-items-center justify-content-between py-4 px-5 text-white\">
                        <div class=\"d-flex align-items-center\">
                            <div class=\"rounded-circle bg-white bg-opacity-25 p-3 me-4\">
                                <i class=\"fa fa-exclamation-triangle fa-2x\"></i>
                            </div>
                            <div>
                                <h4 class=\"mb-0 fw-bold\">Signalaments d'incidents</h4>
                                <p class=\"mb-0 opacity-75\">
                                    {% if total_nouveaux_incidents > 0 %}
                                        Il y a <strong>{{ total_nouveaux_incidents }}</strong> nouveau{{ total_nouveaux_incidents > 1 ? 'x' : '' }} incident{{ total_nouveaux_incidents > 1 ? 's' : '' }} à traiter dans votre copropriété.
                                    {% else %}
                                        Aucun nouvel incident non traité. Tout est en ordre !
                                    {% endif %}
                                </p>
                            </div>
                        </div>
                        <div class=\"text-end d-none d-md-block\">
                            <span class=\"btn btn-outline-light btn-sm rounded-pill px-4\">
                                Voir les détails <i class=\"fa fa-arrow-right ms-2\"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

        {# --- 3. LE TABLEAU DES DERNIERS BADGES --- #}
        <div class=\"card shadow\">
            <div class=\"card-header bg-light d-flex justify-content-between align-items-center\">
                <strong><i class=\"fa fa-history text-secondary me-2\"></i> Derniers badges enregistrés</strong>
                <span class=\"badge bg-secondary\">Les 5 derniers</span>
            </div>
            
            <div class=\"card-body p-0\">
                <div class=\"table-responsive\">
                    <table class=\"table table-hover align-middle mb-0\">
                        <thead class=\"table-light\">
                            <tr>
                                <th class=\"ps-4\">N° Hexa</th>
                                <th>Statut</th>
                                <th>Date d'activation</th>
                                <th>Lot Rattaché</th>
                                <th>Remplacement</th>
                            </tr>
                        </thead>
                        <tbody>
                            {% for badge in derniers_badges %}
                                <tr>
                                    <td class=\"ps-4 fw-bold\">{{ badge.numeroHexa }}</td>
                                    <td>
                                        {% if badge.status == 'actif' %}
                                            <span class=\"badge bg-success\">Actif</span>
                                        {% elseif badge.status == 'perdu' or badge.status == 'Vol' %}
                                            <span class=\"badge bg-danger\">{{ badge.status | capitalize }}</span>
                                        {% else %}
                                            <span class=\"badge bg-secondary\">{{ badge.status | capitalize }}</span>
                                        {% endif %}
                                    </td>
                                    <td>{{ badge.dateActivation ? badge.dateActivation|date('d/m/Y') : '-' }}</td>
                                    <td>{{ badge.lot ? badge.lot : '-' }}</td>
                                    <td>
                                        {% if badge.remplacebadge %}
                                            <span class=\"text-muted\" title=\"Remplace le n°{{ badge.remplacebadge.numeroHexa }}\">
                                                <i class=\"fa fa-exchange-alt\"></i> Oui
                                            </span>
                                        {% else %}
                                            -
                                        {% endif %}
                                    </td>
                                </tr>
                            {% else %}
                                <tr>
                                    <td colspan=\"5\" class=\"text-center py-4 text-muted\">Aucun badge enregistré pour le moment.</td>
                                </tr>
                            {% endfor %}
                        </tbody>
                    </table>
                </div>
            </div>
            <div class=\"card-footer bg-light text-muted small text-center\">
                <i class=\"fa fa-info-circle me-1\"></i> En cas de remplacement d'un badge par un nouveau, veuillez sélectionner le badge perdu et cliquer sur le bouton \"Remplacer\".
            </div>
        </div>
        
    </div>
{% endblock %}", "admin/dashboard.html.twig", "/home/u607724417/domains/syndicopro.lamaisonducode.fr/public_html/templates/admin/dashboard.html.twig");
    }
}
