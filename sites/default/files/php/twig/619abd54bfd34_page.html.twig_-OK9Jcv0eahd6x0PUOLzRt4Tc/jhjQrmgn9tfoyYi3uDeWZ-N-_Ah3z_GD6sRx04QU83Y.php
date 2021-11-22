<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* themes/custom_theme/templates/layout/page.html.twig */
class __TwigTemplate_451ec43baafc9f7add614f666094c037ae435a9b0ea79ab3e1f881948a8d6852 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "
<div class = \"top_navigation\">
<ul class=\"links\">
    <li><a href=\"#\"><i class=\"fab fa-facebook-square\"></i></a></li>
    <li><a href=\"#\"><i class=\"fab fa-linkedin\"></i></a></li>
    <li><a href=\"#\"><i class=\"fab fa-twitter\"></i></a></li>
    <li><a href=\"#\"><i class=\"fab fa-github\"></i></a></li>
    <li><a href=\"#\"><i class=\"fab fa-flickr\"></i></a></li>
</ul>
<button class=\"searchicon\" id =\"searchicon\"><i class=\"fas fa-search\"></i></button>
<div class=\"secondary hide\" id=\"secondary\">
    ";
        // line 12
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "secondary_navigation", [], "any", false, false, true, 12), 12, $this->source), "html", null, true));
        echo "
</div>
</div>
<div class =\"header\" id=\"nav\">
    <div class = \"site_branding\">
        ";
        // line 17
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "site_branding", [], "any", false, false, true, 17), 17, $this->source), "html", null, true));
        echo "
    </div>
    <div class = \"main_navigation\">
        ";
        // line 20
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "main_navigation", [], "any", false, false, true, 20), 20, $this->source), "html", null, true));
        echo "
    </div>
    <div class = \"search\">
        ";
        // line 23
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "search", [], "any", false, false, true, 23), 23, $this->source), "html", null, true));
        echo "
    </div>
</div>
<div class =\"about\">
    ";
        // line 27
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "banner", [], "any", false, false, true, 27), 27, $this->source), "html", null, true));
        echo "
</div>
<div class = \"main\">
    <div class=\"content\">
        <div class=\"sortcontent\">
        <button class=\"listicon\" id =\"listicon\"><i class=\"fas fa-list\"></i></button>
       <button class=\"gridicon\" id =\"gridicon\"><i class=\"fas fa-th\"></i></button>
        </div>
        ";
        // line 35
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 35), 35, $this->source), "html", null, true));
        echo "
    </div>
   
</div>
<div class =\"featured\">
    ";
        // line 40
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "featured", [], "any", false, false, true, 40), 40, $this->source), "html", null, true));
        echo "
    ";
        // line 41
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar", [], "any", false, false, true, 41), 41, $this->source), "html", null, true));
        echo "
</div>

<div class=\"footer\">
    <div class=\"footer1\">
    ";
        // line 46
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer1", [], "any", false, false, true, 46), 46, $this->source), "html", null, true));
        echo " 
    </div>
    <div class=\"footer1\">
    ";
        // line 49
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer2", [], "any", false, false, true, 49), 49, $this->source), "html", null, true));
        echo "
    </div>
    <div class=\"footer1\"> 
    ";
        // line 52
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer3", [], "any", false, false, true, 52), 52, $this->source), "html", null, true));
        echo "
    </div>
</div>
<div class=\"end\">
  <p> Copyright<span>&#169;</span> By Visual Select</p>
</div>";
    }

    public function getTemplateName()
    {
        return "themes/custom_theme/templates/layout/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  122 => 52,  116 => 49,  110 => 46,  102 => 41,  98 => 40,  90 => 35,  79 => 27,  72 => 23,  66 => 20,  60 => 17,  52 => 12,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/custom_theme/templates/layout/page.html.twig", "/var/www/html/drupal/themes/custom_theme/templates/layout/page.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array();
        static $filters = array("escape" => 12);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                [],
                ['escape'],
                []
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
