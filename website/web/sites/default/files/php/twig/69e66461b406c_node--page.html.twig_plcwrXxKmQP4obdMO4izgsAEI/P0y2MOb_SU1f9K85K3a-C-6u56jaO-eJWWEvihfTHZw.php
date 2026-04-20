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

/* themes/custom/lms_bootstrap/templates/node--page.html.twig */
class __TwigTemplate_702cb53914f7b48e22c68784aa07920d extends Template
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
        yield "<section class=\"hero-section text-white d-flex align-items-center\">
  <div class=\"container text-center\">
    <div class=\"row justify-content-center\">
      <div class=\"col-lg-8\">
        <h1 class=\"display-3 fw-bold mb-3\">Impulsa tu carrera con Simple LMS</h1>
        <p class=\"lead mb-5\">Domina las herramientas digitales más demandadas con cursos 100% prácticos.</p>
        <div class=\"d-grid gap-3 d-sm-flex justify-content-sm-center\">
          <a href=\"/cursos\" class=\"btn btn-warning btn-lg px-5 fw-bold\">Explorar cursos</a>
          <a href=\"/user/register\" class=\"btn btn-outline-light btn-lg px-5\">Crear cuenta</a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class=\"benefits-section py-6 bg-white\">
  <div class=\"container\">

    <div class=\"text-center mb-5 mt-4\">
      <h2 class=\"display-4 fw-bold\">¿Por qué Simple LMS?</h2>
      <p class=\"lead text-muted mx-auto\" style=\"max-width: 700px;\">
        No somos solo otra plataforma de videos. Hemos diseñado una experiencia pensada en tu éxito profesional.
      </p>
      <div class=\"mx-auto bg-primary mt-3\" style=\"width: 60px; height: 4px; border-radius: 2px;\"></div>
    </div>

    <div class=\"row g-4 py-4\">

      <div class=\"col-md-4\">
        <div class=\"card h-100 border-0 shadow-lg hover-lift p-4\">
          <div class=\"card-body text-center\">
            <div class=\"icon-circle bg-light-blue mb-4\">
              <span class=\"display-4\">🚀</span>
            </div>
            <h4 class=\"fw-bold mb-3\">100% Práctico</h4>
            <p class=\"text-muted\">Aprende con proyectos reales. Al terminar, tendrás un portafolio listo para mostrar en entrevistas.</p>
          </div>
        </div>
      </div>

      <div class=\"col-md-4\">
        <div class=\"card h-100 border-0 shadow-lg hover-lift p-4\">
          <div class=\"card-body text-center\">
            <div class=\"icon-circle bg-light-green mb-4\">
              <span class=\"display-4\">🤝</span>
            </div>
            <h4 class=\"fw-bold mb-3\">Comunidad Activa</h4>
            <p class=\"text-muted\">Conecta con otros estudiantes y expertos en nuestro canal de Discord. El networking es la clave.</p>
          </div>
        </div>
      </div>

      <div class=\"col-md-4\">
        <div class=\"card h-100 border-0 shadow-lg hover-lift p-4\">
          <div class=\"card-body text-center\">
            <div class=\"icon-circle bg-light-orange mb-4\">
              <span class=\"display-4\">💬</span>
            </div>
            <h4 class=\"fw-bold mb-3\">Soporte 24/7</h4>
            <p class=\"text-muted\">¿Dudas en el código? Nuestros mentores te ayudan a desbloquearte en menos de 24 horas.</p>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- Sección de cursos destacados // permiso a usuarios anonimos -->
<section class=\"py-5\">
  <div class=\"container\">

    <h2 class=\"mb-4 text-center\">Cursos disponibles</h2>

    ";
        // line 75
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, views_embed_view("cursos", "page_1"), "html", null, true);
        yield "

  </div>
</section>

<!--CTA final-->
<section class=\"cta-final-section text-white py-6\">
  <div class=\"container text-center\">
    <div class=\"row justify-content-center\">
      <div class=\"col-lg-8 py-5\">

        ";
        // line 86
        if ((($tmp = ($context["logged_in"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 87
            yield "          <h2 class=\"display-4 fw-bold mb-4\">¿Listo para continuar tu aprendizaje?</h2>
          <p class=\"lead mb-5 op-8\">Tienes cursos pendientes. Retoma tu camino hacia el éxito profesional hoy mismo.</p>
          <a href=\"/cursos\" class=\"btn btn-light btn-lg px-5 py-3 fw-bold shadow-lg hover-scale\">
            Ir a mis cursos 🚀
          </a>
        ";
        } else {
            // line 93
            yield "          <h2 class=\"display-4 fw-bold mb-3\">Empieza a transformar tu futuro hoy</h2>
          <p class=\"lead mb-5 op-8\">Únete a más de 1,000 estudiantes que ya están dominando las habilidades del mañana.</p>

          <div class=\"d-grid gap-3 d-sm-flex justify-content-sm-center\">
            <a href=\"/user/register\" class=\"btn btn-warning btn-lg px-5 py-3 fw-bold shadow-lg hover-scale\">
              Crear cuenta gratis
            </a>
            <a href=\"/cursos\" class=\"btn btn-outline-light btn-lg px-5 py-3\">
              Ver catálogo completo
            </a>
          </div>
          <p class=\"mt-4 small op-7\">Sin tarjetas de crédito • Acceso inmediato</p>
        ";
        }
        // line 106
        yield "
      </div>
    </div>
  </div>
</section>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["logged_in"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/lms_bootstrap/templates/node--page.html.twig";
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
        return array (  159 => 106,  144 => 93,  136 => 87,  134 => 86,  120 => 75,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/custom/lms_bootstrap/templates/node--page.html.twig", "/var/www/html/website/web/themes/custom/lms_bootstrap/templates/node--page.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 86];
        static $filters = ["escape" => 75];
        static $functions = ["drupal_view" => 75];

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape'],
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
