<?php

/* layout.twig */
class __TwigTemplate_80d54e6767eb406e1b606a3f6909c034ab45713ab351ef9ac2d6238d6f3d5028 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'navigation' => array($this, 'block_navigation'),
            'content' => array($this, 'block_content'),
            'footer' => array($this, 'block_footer'),
            'bottom' => array($this, 'block_bottom'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        if (isset($context["navigation"])) { $_navigation_ = $context["navigation"]; } else { $_navigation_ = null; }
        $context["navigation_bar"] = $_navigation_;
        // line 2
        if (isset($context["active_page"])) { $_active_page_ = $context["active_page"]; } else { $_active_page_ = null; }
        $context["active_page"] = ((array_key_exists("active_page", $context)) ? (_twig_default_filter($_active_page_, "index")) : ("index"));
        // line 3
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"utf-8\">
    ";
        // line 7
        $this->displayBlock('head', $context, $blocks);
        // line 20
        echo "</head>
<body>

<div id=\"wrap\">
    <nav class=\"navbar navbar-default\" role=\"navigation\">
        <div class=\"container\">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class=\"navbar-header\">
                <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-ex1-collapse\">
                    <span class=\"sr-only\">Toggle navigation</span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                </button>
                <a class=\"navbar-brand\" href=\"";
        // line 34
        echo twig_escape_filter($this->env, base_url("admin"), "html", null, true);
        echo "\">NameOf.Me</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class=\"collapse navbar-collapse navbar-ex1-collapse\">

                ";
        // line 40
        $this->displayBlock('navigation', $context, $blocks);
        // line 48
        echo "
            </div>
        </div>
    </nav>
    <!-- /nav -->

    <div class=\"container\">


        ";
        // line 57
        $this->displayBlock('content', $context, $blocks);
        // line 58
        echo "    </div>
    <!-- /main container -->


</div>
<!-- /wrap -->

<!-- Sticky footer -->
<div id=\"footer\">
    <div class=\"container\">
        ";
        // line 68
        $this->displayBlock('footer', $context, $blocks);
        // line 71
        echo "
        ";
        // line 72
        if (isset($context["elapsed_time"])) { $_elapsed_time_ = $context["elapsed_time"]; } else { $_elapsed_time_ = null; }
        echo twig_escape_filter($this->env, $_elapsed_time_, "html", null, true);
        echo " ";
        if (isset($context["memory_usage"])) { $_memory_usage_ = $context["memory_usage"]; } else { $_memory_usage_ = null; }
        echo twig_escape_filter($this->env, $_memory_usage_, "html", null, true);
        echo "
    </div>

</div>


<!-- Placed at the end of the document so the pages load faster -->
<script src=\"//code.jquery.com/jquery-1.9.1.min.js\"></script>
<!-- Bootstrap core JavaScript -->
<script src=\"//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js\"></script>

";
        // line 83
        $this->displayBlock('bottom', $context, $blocks);
        // line 84
        echo "

</body>
</html>";
    }

    // line 7
    public function block_head($context, array $blocks = array())
    {
        // line 8
        echo "        <title>";
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

        <link href=\"//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css\" rel=\"stylesheet\">
        <!-- Font Awesome CSS CDN -->
        <link href=\"//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css\" rel=\"stylesheet\">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src=\"//html5shiv.googlecode.com/svn/trunk/html5.js\"></script>
        <script src=\"//cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.min.js\"></script>
        <![endif]-->
    ";
    }

    public function block_title($context, array $blocks = array())
    {
    }

    // line 40
    public function block_navigation($context, array $blocks = array())
    {
        // line 41
        echo "                    <ul class=\"nav navbar-nav navbar-right\">
                        ";
        // line 42
        if (isset($context["navigation_bar"])) { $_navigation_bar_ = $context["navigation_bar"]; } else { $_navigation_bar_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_navigation_bar_);
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 43
            echo "                            <li";
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            if (isset($context["active_page"])) { $_active_page_ = $context["active_page"]; } else { $_active_page_ = null; }
            if (($this->getAttribute($_item_, 0, array(), "array") == $_active_page_)) {
                echo " class=\"active\"";
            }
            echo ">
                                <a href=\"";
            // line 44
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            echo twig_escape_filter($this->env, base_url($this->getAttribute($_item_, 0, array(), "array")), "html", null, true);
            echo "\">";
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_item_, 1, array(), "array"), "html", null, true);
            echo "</a></li>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 46
        echo "                    </ul>
                ";
    }

    // line 57
    public function block_content($context, array $blocks = array())
    {
    }

    // line 68
    public function block_footer($context, array $blocks = array())
    {
        // line 69
        echo "            <p class=\"text-muted credit\">© 2014 nameof.me</p>
        ";
    }

    // line 83
    public function block_bottom($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "layout.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  197 => 83,  192 => 69,  189 => 68,  184 => 57,  179 => 46,  167 => 44,  158 => 43,  153 => 42,  150 => 41,  147 => 40,  126 => 8,  123 => 7,  116 => 84,  114 => 83,  96 => 72,  93 => 71,  91 => 68,  79 => 58,  77 => 57,  66 => 48,  64 => 40,  55 => 34,  39 => 20,  37 => 7,  31 => 3,  28 => 2,  25 => 1,);
    }
}
