<?php

/* test.twig */
class __TwigTemplate_17d9d0778917d5b7e19fbde1a9314e873241b6846ae8c6729d013abb453e9bd6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("templates/layout.twig", "test.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "templates/layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo " Accueil ";
    }

    // line 4
    public function block_content($context, array $blocks = array())
    {
        // line 5
        echo "Salut
";
    }

    public function getTemplateName()
    {
        return "test.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 5,  35 => 4,  29 => 2,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'templates/layout.twig' %}
{% block title %} Accueil {% endblock %}

{% block content %}
Salut
{% endblock %}", "test.twig", "B:\\tete0148\\Dropbox\\Dev\\PHP\\www\\microframework\\views\\test.twig");
    }
}
