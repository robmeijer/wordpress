<?php

namespace RobM\WordPress;

use RobM\WordPress\Action\ActionInterface;
use RobM\WordPress\Filter\FilterInterface;
use RobM\WordPress\Menu\MenuLocationInterface;
use RobM\WordPress\Service\MethodResolver;
use RobM\WordPress\Shortcode\ShortcodeInterface;
use RobM\WordPress\Widget\AbstractWidget;
use RobM\WordPress\Widget\WidgetAreaInterface;

class WordPress
{
    /** @var MethodResolver */
    protected $methodResolver;

    public function __construct(MethodResolver $methodResolver)
    {
        $this->methodResolver = $methodResolver;
    }

    /**
     * Wrapper for the WordPress add_action function for hooks
     *
     * @param string $hook
     * @param ActionInterface $action
     */
    public function addAction(string $hook, ActionInterface $action): void
    {
        $function = '\add_action';

        if (! is_callable($function)) {
            throw new Exception\BadWordPressFunctionCallException($function);
        }

        $function($hook, [$action, 'action'], $action->getPriority(), $action->getArguments());
    }

    /**
     * Wrapper for the WordPress do_action function for hooks
     *
     * @param string $hook
     * @param mixed $arg
     */
    public function doAction(string $hook, $arg = ''): void
    {
        $function = '\do_action';

        if (! is_callable($function)) {
            throw new Exception\BadWordPressFunctionCallException($function);
        }

        $function($hook, $arg);
    }

    /**
     * Wrapper for the WordPress remove_action function for hooks
     *
     * @param string $hook
     * @param ActionInterface $action
     */
    public function removeAction(string $hook, ActionInterface $action): void
    {
        $function = '\remove_action';

        if (! is_callable($function)) {
            throw new Exception\BadWordPressFunctionCallException($function);
        }

        $function($hook, [$action, 'action'], $action->getPriority());
    }

    /**
     * Wrapper for the WordPress add_filter function for hooks
     *
     * @param string $hook
     * @param FilterInterface $filter
     */
    public function addFilter(string $hook, FilterInterface $filter): void
    {
        $function = '\add_filter';

        if (! is_callable($function)) {
            throw new Exception\BadWordPressFunctionCallException($function);
        }

        $function($hook, [$filter, 'filter'], $filter->getPriority(), $filter->getArguments());
    }

    /**
     * Wrapper for the WordPress apply_filters function for hooks
     *
     * @param string $hook
     * @param mixed $value
     * @param array $args
     *
     * @return mixed
     */
    public function applyFilters(string $hook, $value, ...$args)
    {
        $function = '\apply_filters';

        if (! is_callable($function)) {
            throw new Exception\BadWordPressFunctionCallException($function);
        }

        return $function($hook, $value, ...$args);
    }

    /**
     * Wrapper for the WordPress remove_filter function for hooks
     *
     * @param string $hook
     * @param FilterInterface $filter
     */
    public function removeFilter(string $hook, FilterInterface $filter): void
    {
        $function = '\remove_filter';

        if (! is_callable($function)) {
            throw new Exception\BadWordPressFunctionCallException($function);
        }

        $function($hook, [$filter, 'filter'], $filter->getPriority());
    }

    /**
     * Register the given menu location
     *
     * @param MenuLocationInterface $menuLocation
     */
    public function registerMenuLocation(MenuLocationInterface $menuLocation): void
    {
        $function = '\register_nav_menu';

        if (! is_callable($function)) {
            throw new Exception\BadWordPressFunctionCallException($function);
        }

        $function($menuLocation->getLocation(), $menuLocation->getDescription());
    }

    /**
     * Register the given widget area
     *
     * @param WidgetAreaInterface $widgetArea
     */
    public function registerWidgetArea(WidgetAreaInterface $widgetArea): void
    {
        $function = '\register_sidebar';

        if (! is_callable($function)) {
            throw new Exception\BadWordPressFunctionCallException($function);
        }

        $function(
            [
                'id' => $widgetArea->getId(),
                'name' => $widgetArea->getName(),
                'before_widget' => $widgetArea->getBeforeWidget(),
                'after_widget' => $widgetArea->getAfterWidget(),
                'before_title' => $widgetArea->getBeforeTitle(),
                'after_title' => $widgetArea->getAfterTitle(),
            ]
        );
    }

    /**
     * Register the given widget
     *
     * @param AbstractWidget $widget
     */
    public function registerWidget(AbstractWidget $widget): void
    {
        $function = '\register_widget';

        if (! is_callable($function)) {
            throw new Exception\BadWordPressFunctionCallException($function);
        }

        $function($widget);
    }

    /**
     * Wrapper for the WordPress add_shortcode function
     *
     * @param string $tag
     * @param ShortcodeInterface $shortcode
     */
    public function addShortcode(string $tag, ShortcodeInterface $shortcode): void
    {
        $function = '\add_shortcode';

        if (! is_callable($function)) {
            throw new Exception\BadWordPressFunctionCallException($function);
        }

        $function($tag, [$shortcode, 'output']);
    }

    public function __call(string $name, array $arguments)
    {
        return $this->methodResolver->resolve($name, $arguments);
    }
}
