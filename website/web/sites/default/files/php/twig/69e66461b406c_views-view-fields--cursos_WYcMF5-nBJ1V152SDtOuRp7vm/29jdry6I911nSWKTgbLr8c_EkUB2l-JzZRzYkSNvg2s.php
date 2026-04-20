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

/* themes/custom/lms_bootstrap/templates/views/views-view-fields--cursos.html.twig */
class __TwigTemplate_3a2199c0b84cd943fe81598eb5f712cd extends Template
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
        $this->sandbox = $this->extensions[SandboxExtension::class];
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<div class=\"card h-100 border-0 shadow-lg hover-lift-subtle overflow-hidden\">

  ";
        // line 4
        yield "  <div class=\"position-relative overflow-hidden\" style=\"aspect-ratio: 16 / 9;\">
    <div class=\"curso-imagen-wrapper transition-zoom\">
      ";
        // line 6
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "field_imagen", [], "any", false, false, true, 6), "content", [], "any", false, false, true, 6), "html", null, true);
        yield "
    </div>
  </div>

  <div class=\"card-body d-flex flex-column p-4\">
    ";
        // line 12
        yield "    <h5 class=\"card-title fw-bold mb-2 text-dark\" style=\"min-height: 3rem; line-height: 1.4;\">
      ";
        // line 13
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "title", [], "any", false, false, true, 13), "content", [], "any", false, false, true, 13), "html", null, true);
        yield "
    </h5>

    ";
        // line 17
        yield "    <div class=\"d-flex align-items-center mb-3 small text-muted\">
       <span class=\"me-3\">⏱ 12h de contenido</span>
    </div>

    ";
        // line 22
        yield "    <div class=\"card-text text-muted mb-4 flex-grow-1\" style=\"font-size: 0.9rem; line-height: 1.6;\">
      ";
        // line 23
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "field_descripcion", [], "any", false, false, true, 23), "content", [], "any", false, false, true, 23), "html", null, true);
        yield "
    </div>

    ";
        // line 27
        yield "    <div class=\"mt-auto\">
      <a href=\"";
        // line 28
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("entity.node.canonical", ["node" => CoreExtension::getAttribute($this->env, $this->source, ($context["row"] ?? null), "nid", [], "any", false, false, true, 28)]), "html", null, true);
        yield "\" class=\"btn btn-primary w-100 py-2 fw-bold rounded-pill shadow-sm\">
        Empezar a aprender
      </a>
    </div>
  </div>
</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["fields", "row"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/lms_bootstrap/templates/views/views-view-fields--cursos.html.twig";
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
        return array (  87 => 28,  84 => 27,  78 => 23,  75 => 22,  69 => 17,  63 => 13,  60 => 12,  52 => 6,  48 => 4,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/custom/lms_bootstrap/templates/views/views-view-fields--cursos.html.twig", "/var/www/html/website/web/themes/custom/lms_bootstrap/templates/views/views-view-fields--cursos.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = [];
        static $filters = ["escape" => 6];
        static $functions = ["path" => 28];

        try {
            $this->sandbox->checkSecurity(
                [],
                ['escape'],
                ['path'],
                $this->source
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
