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

/* modules/contrib/blazy/templates/blazy.html.twig */
class __TwigTemplate_edd36432b3e6b06f9136ddbfab959bd5d77ff58ced4083799aacef7c6c9bfa5d extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'blazy_player' => [$this, 'block_blazy_player'],
            'blazy_media' => [$this, 'block_blazy_media'],
            'blazy_content' => [$this, 'block_blazy_content'],
            'blazy_caption' => [$this, 'block_blazy_caption'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 55
        $context["classes"] = [0 => ((        // line 56
($context["content"] ?? null)) ? ("media--rendered") : ("")), 1 => ((twig_get_attribute($this->env, $this->source,         // line 57
($context["settings"] ?? null), "bundle", [], "any", false, false, true, 57)) ? (("media--bundle--" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "bundle", [], "any", false, false, true, 57), 57, $this->source)))) : ("")), 2 => ((twig_get_attribute($this->env, $this->source,         // line 58
($context["settings"] ?? null), "namespace", [], "any", false, false, true, 58)) ? (("media--" . $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "namespace", [], "any", false, false, true, 58), 58, $this->source))) : ("")), 3 => (((twig_get_attribute($this->env, $this->source,         // line 59
($context["settings"] ?? null), "lazy", [], "any", false, false, true, 59) && twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "use_loading", [], "any", false, false, true, 59))) ? ("media--loading is-b-loading") : ("")), 4 => ((twig_get_attribute($this->env, $this->source,         // line 60
($context["settings"] ?? null), "media_switch", [], "any", false, false, true, 60)) ? (("media--switch media--switch--" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "media_switch", [], "any", false, false, true, 60), 60, $this->source)))) : ("")), 5 => ((twig_get_attribute($this->env, $this->source,         // line 61
($context["settings"] ?? null), "player", [], "any", false, false, true, 61)) ? ("media--player") : ("")), 6 => ((twig_get_attribute($this->env, $this->source,         // line 62
($context["settings"] ?? null), "ratio", [], "any", false, false, true, 62)) ? (("media--ratio media--ratio--" . $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "ratio", [], "any", false, false, true, 62), 62, $this->source))) : ("")), 7 => ((twig_get_attribute($this->env, $this->source,         // line 63
($context["settings"] ?? null), "responsive_image_style_id", [], "any", false, false, true, 63)) ? ("media--responsive") : ("")), 8 => ((twig_get_attribute($this->env, $this->source,         // line 64
($context["settings"] ?? null), "type", [], "any", false, false, true, 64)) ? (("media--" . $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "type", [], "any", false, false, true, 64), 64, $this->source))) : ("")), 9 => ((twig_get_attribute($this->env, $this->source,         // line 65
($context["settings"] ?? null), "classes", [], "any", false, false, true, 65)) ? (\Drupal\Component\Utility\Html::getClass(twig_join_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "classes", [], "any", false, false, true, 65), 65, $this->source), " "))) : (""))];
        // line 68
        echo "
";
        // line 69
        if (twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "player", [], "any", false, false, true, 69)) {
            // line 70
            echo "  ";
            $context["attributes"] = twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "setAttribute", [0 => "aria-live", 1 => "polite"], "method", false, false, true, 70);
            // line 71
            echo "
  ";
            // line 72
            $context["play_title"] = t("Load and play video.");
            // line 73
            echo "  ";
            $context["close_title"] = t("Stop and close video.");
            // line 74
            echo "  ";
            if (twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "accessible_title", [], "any", false, false, true, 74)) {
                // line 75
                echo "    ";
                $context["play_title"] = t("Load and play the video \"@label\".", ["@label" => twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "accessible_title", [], "any", false, false, true, 75)]);
                // line 76
                echo "    ";
                $context["close_title"] = t("Stop and close the video \"@label\".", ["@label" => twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "accessible_title", [], "any", false, false, true, 76)]);
                // line 77
                echo "  ";
            }
            // line 78
            echo "
  ";
            // line 79
            $context["play_button_attributes"] = $this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute(["aria-label" =>             // line 80
($context["play_title"] ?? null), "class" => [0 => "media__icon", 1 => "media__icon--play"], "data-url" => twig_get_attribute($this->env, $this->source,             // line 82
($context["settings"] ?? null), "embed_url", [], "any", false, false, true, 82), "data-iframe-title" => twig_get_attribute($this->env, $this->source,             // line 83
($context["settings"] ?? null), "accessible_title", [], "any", false, false, true, 83), "title" =>             // line 84
($context["play_title"] ?? null), "type" => "button"]);
            // line 87
            echo "
  ";
            // line 88
            $context["close_button_attributes"] = $this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute(["aria-label" =>             // line 89
($context["close_title"] ?? null), "class" => [0 => "media__icon", 1 => "media__icon--close"], "title" =>             // line 91
($context["close_title"] ?? null), "type" => "button"]);
        }
        // line 95
        echo "
";
        // line 96
        ob_start(function () { return ''; });
        // line 97
        echo "  ";
        $this->displayBlock('blazy_player', $context, $blocks);
        $context["player"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 106
        echo "
";
        // line 107
        ob_start(function () { return ''; });
        // line 108
        echo "  ";
        $this->displayBlock('blazy_media', $context, $blocks);
        $context["media"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 123
        echo "
";
        // line 124
        ob_start(function () { return ''; });
        // line 125
        echo "  ";
        $this->displayBlock('blazy_content', $context, $blocks);
        // line 142
        echo "
  ";
        // line 143
        if ((($context["captions"] ?? null) && twig_get_attribute($this->env, $this->source, ($context["captions"] ?? null), "inline", [], "any", true, true, true, 143))) {
            // line 144
            echo "    ";
            $this->displayBlock('blazy_caption', $context, $blocks);
            // line 153
            echo "  ";
        }
        // line 155
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["postscript"] ?? null), 155, $this->source), "html", null, true));
        $context["blazy"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 158
        echo "
";
        // line 159
        if (($context["wrapper_attributes"] ?? null)) {
            // line 160
            echo "  <div";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["wrapper_attributes"] ?? null), 160, $this->source), "html", null, true));
            echo ">";
            // line 161
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["blazy"] ?? null), 161, $this->source), "html", null, true));
            // line 162
            echo "</div>
";
        } else {
            // line 164
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["blazy"] ?? null), 164, $this->source), "html", null, true));
            echo "
";
        }
    }

    // line 97
    public function block_blazy_player($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 98
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "player", [], "any", false, false, true, 98)) {
            // line 99
            echo "      <button";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["close_button_attributes"] ?? null), 99, $this->source), "html", null, true));
            echo "></button>
      <button";
            // line 100
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["play_button_attributes"] ?? null), 100, $this->source), "html", null, true));
            echo "></button>
    ";
        } else {
            // line 102
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["iframe"] ?? null), 102, $this->source), "html", null, true));
        }
        // line 104
        echo "  ";
    }

    // line 108
    public function block_blazy_media($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 109
        echo "    <div";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 109), 109, $this->source), "html", null, true));
        echo ">";
        // line 110
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["preface"] ?? null), 110, $this->source), "html", null, true));
        // line 111
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["noscript"] ?? null), 111, $this->source), "html", null, true));
        // line 112
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 112, $this->source), "html", null, true));
        // line 113
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["image"] ?? null), 113, $this->source), "html", null, true));
        // line 114
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["overlay"] ?? null), 114, $this->source), "html", null, true));
        // line 115
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["player"] ?? null), 115, $this->source), "html", null, true));
        // line 118
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "icon", [], "any", false, false, true, 118), 118, $this->source), "html", null, true));
        // line 119
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["icon"] ?? null), 119, $this->source), "html", null, true));
        // line 120
        echo "</div>
  ";
    }

    // line 125
    public function block_blazy_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 126
        echo "    ";
        if (($context["media_attributes"] ?? null)) {
            echo "<div";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["media_attributes"] ?? null), 126, $this->source), "html", null, true));
            echo ">";
        }
        // line 127
        echo "      ";
        if ((($context["url"] ?? null) &&  !twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "player", [], "any", false, false, true, 127))) {
            // line 128
            echo "        <a href=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["url"] ?? null), 128, $this->source), "html", null, true));
            echo "\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["url_attributes"] ?? null), 128, $this->source), "html", null, true));
            echo ">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["media"] ?? null), 128, $this->source), "html", null, true));
            echo "</a>

        ";
            // line 131
            echo "        ";
            if ((($context["captions"] ?? null) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["captions"] ?? null), "lightbox", [], "any", false, false, true, 131)))) {
                // line 132
                echo "          <div class=\"litebox-caption visually-hidden\">";
                // line 133
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["captions"] ?? null), "lightbox", [], "any", false, false, true, 133), 133, $this->source), "html", null, true));
                // line 134
                echo "</div>
        ";
            }
            // line 136
            echo "
      ";
        } else {
            // line 138
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["media"] ?? null), 138, $this->source), "html", null, true));
        }
        // line 140
        echo "    ";
        if (($context["media_attributes"] ?? null)) {
            echo "</div>";
        }
        // line 141
        echo "  ";
    }

    // line 144
    public function block_blazy_caption($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 145
        echo "      <div";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["caption_attributes"] ?? null), 145, $this->source), "html", null, true));
        echo ">
        ";
        // line 146
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["captions"] ?? null), "inline", [], "any", false, false, true, 146));
        foreach ($context['_seq'] as $context["_key"] => $context["caption"]) {
            // line 147
            echo "          ";
            if (twig_get_attribute($this->env, $this->source, $context["caption"], "content", [], "any", false, false, true, 147)) {
                // line 148
                echo "            <";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["caption"], "tag", [], "any", false, false, true, 148), 148, $this->source), "html", null, true));
                echo " ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["caption"], "attributes", [], "any", false, false, true, 148), 148, $this->source), "html", null, true));
                echo ">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["caption"], "content", [], "any", false, false, true, 148), 148, $this->source), "html", null, true));
                echo "</";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["caption"], "tag", [], "any", false, false, true, 148), 148, $this->source), "html", null, true));
                echo ">
          ";
            }
            // line 150
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['caption'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 151
        echo "      </div>
    ";
    }

    public function getTemplateName()
    {
        return "modules/contrib/blazy/templates/blazy.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  300 => 151,  294 => 150,  282 => 148,  279 => 147,  275 => 146,  270 => 145,  266 => 144,  262 => 141,  257 => 140,  254 => 138,  250 => 136,  246 => 134,  244 => 133,  242 => 132,  239 => 131,  229 => 128,  226 => 127,  219 => 126,  215 => 125,  210 => 120,  208 => 119,  206 => 118,  204 => 115,  202 => 114,  200 => 113,  198 => 112,  196 => 111,  194 => 110,  190 => 109,  186 => 108,  182 => 104,  179 => 102,  174 => 100,  169 => 99,  166 => 98,  162 => 97,  155 => 164,  151 => 162,  149 => 161,  145 => 160,  143 => 159,  140 => 158,  137 => 155,  134 => 153,  131 => 144,  129 => 143,  126 => 142,  123 => 125,  121 => 124,  118 => 123,  114 => 108,  112 => 107,  109 => 106,  105 => 97,  103 => 96,  100 => 95,  97 => 91,  96 => 89,  95 => 88,  92 => 87,  90 => 84,  89 => 83,  88 => 82,  87 => 80,  86 => 79,  83 => 78,  80 => 77,  77 => 76,  74 => 75,  71 => 74,  68 => 73,  66 => 72,  63 => 71,  60 => 70,  58 => 69,  55 => 68,  53 => 65,  52 => 64,  51 => 63,  50 => 62,  49 => 61,  48 => 60,  47 => 59,  46 => 58,  45 => 57,  44 => 56,  43 => 55,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/contrib/blazy/templates/blazy.html.twig", "/var/www/html/drupal/modules/contrib/blazy/templates/blazy.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 55, "if" => 69, "block" => 97, "for" => 146);
        static $filters = array("clean_class" => 57, "join" => 65, "t" => 72, "escape" => 155);
        static $functions = array("create_attribute" => 79);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'block', 'for'],
                ['clean_class', 'join', 't', 'escape'],
                ['create_attribute']
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
