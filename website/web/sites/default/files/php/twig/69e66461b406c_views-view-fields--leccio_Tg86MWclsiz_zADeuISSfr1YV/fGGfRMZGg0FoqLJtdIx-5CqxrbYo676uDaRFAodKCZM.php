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

/* themes/custom/lms_bootstrap/templates/views/views-view-fields--lecciones-del-curso.html.twig */
class __TwigTemplate_0557d0b86d0ca4175361eac19b11ee63 extends Template
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
        $context["node_id"] = Twig\Extension\CoreExtension::trim(Twig\Extension\CoreExtension::striptags(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "nid", [], "any", false, false, true, 1), "content", [], "any", false, false, true, 1)));
        // line 2
        yield "
";
        // line 3
        $context["lesson_url"] = $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("entity.node.canonical", ["node" => ($context["node_id"] ?? null)]);
        // line 4
        $context["current"] = $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("<current>");
        // line 5
        yield "
<a href=\"";
        // line 6
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["lesson_url"] ?? null), "html", null, true);
        yield "\"
   class=\"list-group-item list-group-item-action d-flex justify-content-between align-items-center
   ";
        // line 8
        if ((($context["lesson_url"] ?? null) == ($context["current"] ?? null))) {
            yield "active";
        }
        yield "\">

  <span>

    <span class=\"me-2\">
      ";
        // line 13
        if ((($tmp = ($context["completed"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 14
            yield "        <span class=\"text-success\">✔</span>
      ";
        } else {
            // line 16
            yield "        <span class=\"text-secondary\">○</span>
      ";
        }
        // line 18
        yield "    </span>

    <strong class=\"me-2\">
      ";
        // line 21
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "field_orden", [], "any", false, false, true, 21), "content", [], "any", false, false, true, 21), "html", null, true);
        yield ".
    </strong>

    ";
        // line 24
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "title", [], "any", false, false, true, 24), "content", [], "any", false, false, true, 24), "html", null, true);
        yield "

  </span>

</a>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["fields", "completed"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/lms_bootstrap/templates/views/views-view-fields--lecciones-del-curso.html.twig";
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
        return array (  92 => 24,  86 => 21,  81 => 18,  77 => 16,  73 => 14,  71 => 13,  61 => 8,  56 => 6,  53 => 5,  51 => 4,  49 => 3,  46 => 2,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/custom/lms_bootstrap/templates/views/views-view-fields--lecciones-del-curso.html.twig", "/var/www/html/website/web/themes/custom/lms_bootstrap/templates/views/views-view-fields--lecciones-del-curso.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 1, "if" => 8];
        static $filters = ["trim" => 1, "striptags" => 1, "escape" => 6];
        static $functions = ["path" => 3];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['trim', 'striptags', 'escape'],
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
