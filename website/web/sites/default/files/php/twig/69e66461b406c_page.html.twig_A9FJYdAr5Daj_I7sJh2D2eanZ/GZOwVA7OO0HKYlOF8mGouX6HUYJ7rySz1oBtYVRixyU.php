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

/* themes/custom/lms_bootstrap/templates/layout/page.html.twig */
class __TwigTemplate_a7c26f864c586fdfdd45d347e6ae3d3d extends Template
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
        yield "<body";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", ["d-flex", "flex-column", "min-vh-100"], "method", false, false, true, 1), "html", null, true);
        yield ">

  <header>
    <nav class=\"navbar navbar-expand-lg navbar-dark bg-dark shadow-sm\">
      <div class=\"container\">
        <a class=\"navbar-brand d-flex align-items-center\" href=\"";
        // line 6
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getPath("<front>"));
        yield "\">
          <img src=\"../";
        // line 7
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["directory"] ?? null), "html", null, true);
        yield "/logo.svg\" alt=\"Logo\" height=\"40\" class=\"me-2\">
          <span class=\"fw-bold\">Simple LMS</span>
        </a>

        <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarSupportedContent\">
          <span class=\"navbar-toggler-icon\"></span>
        </button>

        <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
          <ul class=\"navbar-nav me-auto mb-2 mb-lg-0\">
            <li class=\"nav-item\">
              <a class=\"nav-link nav-explorar px-3\" href=\"/cursos\">Explorar Cursos</a>
            </li>
            ";
        // line 20
        if ((($tmp = ($context["logged_in"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 21
            yield "              <li class=\"nav-item\">
                <a class=\"nav-link nav-mis-cursos px-3\" href=\"";
            // line 22
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getPath("view.mis_cursos.page_1"));
            yield "\">Mis Cursos</a>
              </li>
            ";
        }
        // line 25
        yield "          </ul>

          <div class=\"d-flex align-items-center\">
            ";
        // line 28
        if ((($tmp = ($context["logged_in"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 29
            yield "              <div class=\"dropdown me-3\">
                <span class=\"text-light small\">
                  Hola, <strong>";
            // line 31
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "displayName", [], "any", false, false, true, 31), "html", null, true);
            yield "</strong>
                </span>
              </div>
              ";
            // line 34
            if (CoreExtension::inFilter("instructor", CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "getRoles", [], "method", false, false, true, 34))) {
                // line 35
                yield "                <a href=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getPath("node.add", ["node_type" => "curso"]));
                yield "\" class=\"btn btn-success btn-sm me-2\">+ Curso</a>
              ";
            }
            // line 37
            yield "              <a href=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getPath("user.logout"));
            yield "\" class=\"btn btn-outline-danger btn-sm\">Salir</a>
            ";
        } else {
            // line 39
            yield "              <a href=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getPath("user.login"));
            yield "\" class=\"btn btn-outline-light btn-sm me-2\">Entrar</a>
              <a href=\"";
            // line 40
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getPath("user.register"));
            yield "\" class=\"btn btn-primary btn-sm px-3\">Registrarse</a>
            ";
        }
        // line 42
        yield "          </div>
        </div>
      </div>
    </nav>
  </header>

  ";
        // line 49
        yield "
  <main class=\"flex-fill\">
    ";
        // line 52
        yield "    ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 52), "html", null, true);
        yield "
  </main>

  <footer class=\"bg-dark text-white-50 py-5 mt-auto\">
    <div class=\"container\">
      <div class=\"row g-4\">
        <div class=\"col-md-4\">
          <h5 class=\"text-white fw-bold mb-3\">Simple LMS</h5>
          <p class=\"small\">La plataforma educativa donde aprendes con proyectos reales y mentoría constante.</p>
        </div>
        <div class=\"col-md-2 offset-md-1\">
          <h6 class=\"text-white fw-bold mb-3\">Enlaces</h6>
          <ul class=\"list-unstyled small\">
            <li><a href=\"#\" class=\"text-decoration-none text-white-50\">FAQ</a></li>
            <li><a href=\"#\" class=\"text-decoration-none text-white-50\">Soporte</a></li>
            <li><a href=\"#\" class=\"text-decoration-none text-white-50\">Términos</a></li>
          </ul>
        </div>
        <div class=\"col-md-2\">
          <h6 class=\"text-white fw-bold mb-3\">Comunidad</h6>
          <ul class=\"list-unstyled small\">
            <li><a href=\"#\" class=\"text-decoration-none text-white-50\">Twitter</a></li>
            <li><a href=\"#\" class=\"text-decoration-none text-white-50\">Facebook</a></li>
            <li><a href=\"#\" class=\"text-decoration-none text-white-50\">Discord</a></li>
          </ul>
        </div>
        <div class=\"col-md-3\">
          <h6 class=\"text-white fw-bold mb-3\">Contacto</h6>
          <p class=\"small mb-1\">contacto@simplelms.com</p>
          <div class=\"mt-3\">
             <i class=\"bi bi-envelope me-2\"></i>
          </div>
        </div>
      </div>
      <hr class=\"my-4 border-secondary\">
      <div class=\"text-center small\">
        © ";
        // line 88
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "Y"), "html", null, true);
        yield " Simple LMS. Todos los derechos reservados.
      </div>
    </div>
  </footer>

  <js-bottom-placeholder token=\"";
        // line 93
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["placeholder_token"] ?? null), "html", null, true);
        yield "\">
</body>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["attributes", "directory", "logged_in", "user", "page", "placeholder_token"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/lms_bootstrap/templates/layout/page.html.twig";
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
        return array (  185 => 93,  177 => 88,  137 => 52,  133 => 49,  125 => 42,  120 => 40,  115 => 39,  109 => 37,  103 => 35,  101 => 34,  95 => 31,  91 => 29,  89 => 28,  84 => 25,  78 => 22,  75 => 21,  73 => 20,  57 => 7,  53 => 6,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/custom/lms_bootstrap/templates/layout/page.html.twig", "/var/www/html/website/web/themes/custom/lms_bootstrap/templates/layout/page.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 20];
        static $filters = ["escape" => 1, "date" => 88];
        static $functions = ["path" => 6];

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape', 'date'],
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
