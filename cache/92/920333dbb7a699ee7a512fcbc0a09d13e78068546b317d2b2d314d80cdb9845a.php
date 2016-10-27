<?php

/* templates/layout.twig */
class __TwigTemplate_03ccfa4054c66af43bb4b4e9f984c42ff7205a6a46ad0bdeeeebd3fe252ce112 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!doctype html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css\"/>
    <title>Microframework - ";
        // line 8
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
</head>
<body>
<div class=\"container\">
<h1>Microframework</h1>
";
        // line 13
        $this->displayBlock('content', $context, $blocks);
        // line 15
        echo "</div>
</body>
</html>";
    }

    // line 8
    public function block_title($context, array $blocks = array())
    {
    }

    // line 13
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "templates/layout.twig";
    }

    public function getDebugInfo()
    {
        return array (  51 => 13,  46 => 8,  40 => 15,  38 => 13,  30 => 8,  21 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!doctype html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css\"/>
    <title>Microframework - {% block title %}{% endblock %}</title>
</head>
<body>
<div class=\"container\">
<h1>Microframework</h1>
{% block content %}
{% endblock %}
</div>
</body>
</html>", "templates/layout.twig", "B:\\tete0148\\Dropbox\\Dev\\PHP\\www\\microframework\\views\\templates\\layout.twig");
    }
}
