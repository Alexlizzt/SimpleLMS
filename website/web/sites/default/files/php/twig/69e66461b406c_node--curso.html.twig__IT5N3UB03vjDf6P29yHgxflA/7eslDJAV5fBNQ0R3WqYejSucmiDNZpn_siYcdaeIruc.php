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

/* themes/custom/lms_bootstrap/templates/node--curso.html.twig */
class __TwigTemplate_85446b8261d0d9baf13a10bb36fbc0e8 extends Template
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
  <div class=\"row\">
    <div class=\"col-md-8\">
      <h1 class=\"mb-3\">";
        // line 4
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["label"] ?? null), "html", null, true);
        yield "</h1>

      ";
        // line 6
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_imagen", [], "any", false, false, true, 6)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 7
            yield "        <div class=\"mb-4 rounded overflow-hidden\">
          ";
            // line 8
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_imagen", [], "any", false, false, true, 8), "html", null, true);
            yield "
        </div>
      ";
        }
        // line 11
        yield "
      <div class=\"mb-4 lead\">
        ";
        // line 13
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_descripcion", [], "any", false, false, true, 13), "html", null, true);
        yield "
      </div>

      <hr class=\"my-5\">
      ";
        // line 17
        if ((($tmp =  !($context["is_enrolled"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 18
            yield "        <div class=\"alert alert-info\">
          <h4 class=\"alert-heading\">¡Inscríbete para acceder al contenido del curso!</h4>
          <p>Al inscribirte, podrás seguir tu progreso, acceder a las lecciones y completar el curso a tu ritmo.</p>
          <hr>
          <a href=\"/course/";
            // line 22
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "id", [], "any", false, false, true, 22), "html", null, true);
            yield "/enroll\" class=\"btn btn-primary\">
            Inscribirse ahora
          </a>
        </div>
      ";
        }
        // line 27
        yield "
      ";
        // line 28
        if ((($tmp = ($context["is_enrolled"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 29
            yield "        <h3 class=\"mb-4 fw-bold\">Plan de estudios</h3>
        <div class=\"lecciones-wrapper p-3 bg-light rounded\">
          ";
            // line 31
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, views_embed_view("lecciones_del_curso", "block_1", CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "nid", [], "any", false, false, true, 31), "value", [], "any", false, false, true, 31)), "html", null, true);
            yield "
        </div>
      ";
        }
        // line 34
        yield "    </div>
    <div class=\"col-md-4\">
      <div class=\"card shadow-sm\">
        <div class=\"card-body\">

          <h5 class=\"mb-3\">Progreso del curso</h5>

          <div class=\"progress mb-2\" style=\"height: 20px;\">
            <div
              class=\"progress-bar bg-success\"
              role=\"progressbar\"
              style=\"width: ";
        // line 45
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ((array_key_exists("course_progress", $context)) ? (Twig\Extension\CoreExtension::default(($context["course_progress"] ?? null), 0)) : (0)), "html", null, true);
        yield "%;\"
              aria-valuenow=\"";
        // line 46
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ((array_key_exists("course_progress", $context)) ? (Twig\Extension\CoreExtension::default(($context["course_progress"] ?? null), 0)) : (0)), "html", null, true);
        yield "\"
              aria-valuemin=\"0\"
              aria-valuemax=\"100\">

              ";
        // line 51
        yield "              ";
        if ((($context["course_progress"] ?? null) > 15)) {
            // line 52
            yield "                ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["course_progress"] ?? null), "html", null, true);
            yield "%
              ";
        }
        // line 54
        yield "            </div>
          </div>

          ";
        // line 58
        yield "          <div class=\"d-flex justify-content-between align-items-center\">
            <small class=\"text-muted\">
              ";
        // line 60
        if ((($context["course_progress"] ?? null) == 0)) {
            // line 61
            yield "                Aún no has comenzado este curso
              ";
        } elseif ((        // line 62
($context["course_progress"] ?? null) == 100)) {
            // line 63
            yield "                🎉 Curso completado
              ";
        } else {
            // line 65
            yield "                Sigue avanzando (";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["course_progress"] ?? null), "html", null, true);
            yield "%)
              ";
        }
        // line 67
        yield "            </small>
          </div>

        </div>
      </div>
    </div>
</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["label", "content", "is_enrolled", "node", "course_progress"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/lms_bootstrap/templates/node--curso.html.twig";
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
        return array (  166 => 67,  160 => 65,  156 => 63,  154 => 62,  151 => 61,  149 => 60,  145 => 58,  140 => 54,  134 => 52,  131 => 51,  124 => 46,  120 => 45,  107 => 34,  101 => 31,  97 => 29,  95 => 28,  92 => 27,  84 => 22,  78 => 18,  76 => 17,  69 => 13,  65 => 11,  59 => 8,  56 => 7,  54 => 6,  49 => 4,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/custom/lms_bootstrap/templates/node--curso.html.twig", "/var/www/html/website/web/themes/custom/lms_bootstrap/templates/node--curso.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 6];
        static $filters = ["escape" => 4, "default" => 45];
        static $functions = ["drupal_view" => 31];

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape', 'default'],
                ['drupal_view'],
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
