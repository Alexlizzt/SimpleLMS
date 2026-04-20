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

/* themes/custom/lms_bootstrap/templates/views/views-view-fields--mis-cursos.html.twig */
class __TwigTemplate_354136d7ebecbbbe31b9fd70ab95ded8 extends Template
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
        yield "<div class=\"container py-5\">
<div class=\"card border-0 shadow-sm mb-4 overflow-hidden hover-shadow-transition\">
  <div class=\"row g-0 align-items-center\">

    ";
        // line 6
        yield "    <div class=\"col-md-3\">
      <div class=\"position-relative\" style=\"aspect-ratio: 16/9; overflow: hidden;\">
        ";
        // line 8
        if ((($tmp = ($context["curso_imagen_render"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 9
            yield "          <div class=\"h-100 w-100 object-fit-cover\">
            ";
            // line 10
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["curso_imagen_render"] ?? null), "html", null, true);
            yield "
          </div>
        ";
        }
        // line 13
        yield "        ";
        if ((($tmp = ($context["course_complete"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 14
            yield "          <div class=\"position-absolute top-0 start-0 w-100 h-100 bg-success bg-opacity-25 d-flex align-items-center justify-content-center\">
            <span class=\"badge bg-success rounded-pill px-3 shadow-sm\">✅ Completado</span>
          </div>
        ";
        }
        // line 18
        yield "      </div>
    </div>

    ";
        // line 22
        yield "    <div class=\"col-md-9\">
      <div class=\"card-body p-4 d-flex flex-column h-100\">

        <div class=\"d-flex justify-content-between align-items-start mb-2\">
          <h5 class=\"card-title fw-bold mb-3 text-dark\"
              style=\"display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; min-height: 3rem; line-height: 1.5rem;\">
            ";
        // line 28
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), "title", [], "any", false, false, true, 28), "content", [], "any", false, false, true, 28), "html", null, true);
        yield "
          </h5>
          <span class=\"badge bg-light text-primary border\">";
        // line 30
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["curso_progreso"] ?? null), "html", null, true);
        yield "% completo</span>
        </div>

        ";
        // line 34
        yield "        ";
        $context["color_clase"] = "bg-secondary";
        // line 35
        yield "        ";
        if (((($context["curso_progreso"] ?? null) > 0) && (($context["curso_progreso"] ?? null) < 100))) {
            // line 36
            yield "          ";
            $context["color_clase"] = "bg-primary";
            // line 37
            yield "        ";
        } elseif ((($context["curso_progreso"] ?? null) == 100)) {
            // line 38
            yield "          ";
            $context["color_clase"] = "bg-success";
            // line 39
            yield "        ";
        }
        // line 40
        yield "
        <div class=\"progress mb-4\" style=\"height: 12px; border-radius: 6px; background-color: #e9ecef;\">
          <div class=\"progress-bar progress-bar-striped ";
        // line 42
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar((((($context["curso_progreso"] ?? null) > 0)) ? ("progress-bar-animated") : ("")));
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["color_clase"] ?? null), "html", null, true);
        yield "\"
              role=\"progressbar\"
              style=\"width: ";
        // line 44
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["curso_progreso"] ?? null), "html", null, true);
        yield "%;\"
              aria-valuenow=\"";
        // line 45
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["curso_progreso"] ?? null), "html", null, true);
        yield "\"
              aria-valuemin=\"0\"
              aria-valuemax=\"100\">
            ";
        // line 48
        if ((($context["curso_progreso"] ?? null) > 5)) {
            // line 49
            yield "              <span class=\"small fw-bold\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["curso_progreso"] ?? null), "html", null, true);
            yield "%</span>
            ";
        }
        // line 51
        yield "          </div>
        </div>

        ";
        // line 55
        yield "        <div class=\"mt-auto pt-3\">

          ";
        // line 58
        yield "          <div class=\"text-center mb-3\">
            <a href=\"";
        // line 59
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("lms_progress.continue_course", ["course" => ($context["curso_id"] ?? null)]), "html", null, true);
        yield "\"
              class=\"btn btn-primary btn-lg rounded-pill px-5 shadow fw-bold hover-scale w-100 w-md-auto\">
              <i class=\"bi bi-play-circle-fill me-2\"></i>
              ";
        // line 62
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar((((($tmp = ($context["course_complete"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Repasar curso") : ("Continuar lección")));
        yield "
            </a>
          </div>

          ";
        // line 67
        yield "          <div class=\"border-top pt-3 d-flex justify-content-center gap-3\">

            ";
        // line 70
        yield "            <a href=\"";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("entity.node.canonical", ["node" => ($context["curso_id"] ?? null)]), "html", null, true);
        yield "\"
              class=\"btn btn-link btn-sm text-muted text-decoration-none hover-dark\">
              <i class=\"bi bi-eye me-1\"></i> Ver detalles
            </a>

            ";
        // line 76
        yield "            ";
        if ((($tmp = ($context["course_complete"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 77
            yield "              <a href=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("lms_progress.certificate", ["course" => ($context["curso_id"] ?? null)]), "html", null, true);
            yield "\"
                class=\"btn btn-outline-success btn-sm px-3 rounded-pill\">
                <i class=\"bi bi-download me-1\"></i> Certificado
              </a>
            ";
        }
        // line 82
        yield "
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["curso_imagen_render", "course_complete", "fields", "curso_progreso", "curso_id"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/lms_bootstrap/templates/views/views-view-fields--mis-cursos.html.twig";
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
        return array (  195 => 82,  186 => 77,  183 => 76,  174 => 70,  170 => 67,  163 => 62,  157 => 59,  154 => 58,  150 => 55,  145 => 51,  139 => 49,  137 => 48,  131 => 45,  127 => 44,  120 => 42,  116 => 40,  113 => 39,  110 => 38,  107 => 37,  104 => 36,  101 => 35,  98 => 34,  92 => 30,  87 => 28,  79 => 22,  74 => 18,  68 => 14,  65 => 13,  59 => 10,  56 => 9,  54 => 8,  50 => 6,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/custom/lms_bootstrap/templates/views/views-view-fields--mis-cursos.html.twig", "/var/www/html/website/web/themes/custom/lms_bootstrap/templates/views/views-view-fields--mis-cursos.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 8, "set" => 34];
        static $filters = ["escape" => 10];
        static $functions = ["path" => 59];

        try {
            $this->sandbox->checkSecurity(
                ['if', 'set'],
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
