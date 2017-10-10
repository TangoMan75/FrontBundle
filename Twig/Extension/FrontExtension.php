<?php

namespace TangoMan\FrontBundle\Twig\Extension;

use Symfony\Component\HttpFoundation\RequestStack;

class FrontExtension extends \Twig_Extension
{
    /**
     * @var \Twig_Environment
     */
    private $template;

    /**
     * @var RequestStack
     */
    protected $request;

    /**
     * @return string
     */
    public function getName()
    {
        return 'tangoman_front';
    }

    /**
     * FrontExtension constructor.
     *
     * @param \Twig_Environment $template
     */
    public function __construct(\Twig_Environment $template, RequestStack $requestStack)
    {
        $this->template = $template;
        $this->request = $requestStack->getCurrentRequest();
    }

    /**
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction(
                'route_granted', [$this, 'routeGrantedFunction']
            ),
            new \Twig_SimpleFunction(
                'route_end_with', [$this, 'routeEndWithFunction']
            ),
            new \Twig_SimpleFunction(
                'menu', [$this, 'menuFunction'], ['is_safe' => ['html']]
            ),
            new \Twig_SimpleFunction(
                'searchForm', [$this, 'searchFormFunction'], ['is_safe' => ['html']]
            ),
            new \Twig_SimpleFunction(
                'thead', [$this, 'theadFunction'], ['is_safe' => ['html']]
            ),
            new \Twig_SimpleFunction(
                'buttons', [$this, 'buttonsFunction'], ['is_safe' => ['html']]
            ),
            new \Twig_SimpleFunction(
                'modal', [$this, 'modalFunction'], ['is_safe' => ['html']]
            ),
            new \Twig_SimpleFunction(
                'parse_button', [$this, 'parseButtonFunction']
            ),
        ];
    }

    /**
     * Checks if at least one item from allowedRoutes starts with route
     * Returns true when allowedRoutes is empty
     *
     * @param string $route
     * @param array  $allowedRoutes
     *
     * @return bool
     */
    public function routeGrantedFunction($route, $allowedRoutes = [])
    {
        if ($allowedRoutes == []) {
            return true;
        }

        if (in_array($route, $allowedRoutes)) {
            return true;
        } else {
            foreach ($allowedRoutes as $item) {
                if (strpos($route, $item) === 0) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Checks if at least one item from allowedRoutes ends with route
     * Returns true when allowedRoutes is empty
     *
     * @param string $route
     * @param array  $allowedRoutes
     *
     * @return bool
     */
    public function routeEndWithFunction($route, $allowedRoutes = [])
    {
        if ($allowedRoutes == []) {
            return true;
        }

        if (in_array($route, $allowedRoutes)) {
            return true;
        } else {
            foreach ($allowedRoutes as $item) {
                $length = strlen($route);
                if (substr($allowedRoutes, -$length) === $route) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * @param string $template
     *
     * @return string
     */
    public function menuFunction($menu, $template = 'menu')
    {
        $templates = [
            'menu',
            'navbar',
            'tabs',
        ];

        if (in_array($template, $templates)) {
            $template = '@TangoManFront/'.$template.'.html.twig';
        }

        if (is_string($menu)) {
            $menu = json_decode($menu);
        }

        return $this->template->render(
            $template,
            [
                'menu' => $menu,
            ]
        );
    }

    /**
     * @param        $form
     * @param string $template
     *
     * @return string
     */
    public function searchFormFunction($form, $template = 'search-form')
    {
        $templates = [
            'search-form',
        ];

        if (in_array($template, $templates)) {
            $template = '@TangoManFront/'.$template.'.html.twig';
        }

        if (is_string($form)) {
            $form = json_decode($form);
        }

        return $this->template->render(
            $template,
            [
                'form' => $form,
            ]
        );
    }

    /**
     * @param        $thead
     * @param string $template
     *
     * @return string
     */
    public function theadFunction($thead, $template = 'thead')
    {
        $templates = [
            'thead',
        ];

        if (in_array($template, $templates)) {
            $template = '@TangoManFront/'.$template.'.html.twig';
        }

        if (is_string($thead)) {
            $thead = json_decode($thead);
        }

        // Set default way
        parse_str($this->request->getQueryString(), $params);
        $way = 'ASC';
        if (isset($params['way'])) {
            // Correct corrupt way
            switch ($params['way']) {
                case 'ASC':
                case 'DESC':
                    $way = $params['way'];
                    break;
                default:
                    $way = 'ASC';
            }
        }

        return $this->template->render(
            $template,
            [
                'thead' => $thead,
                'way'   => $way,
            ]
        );
    }

    /**
     * @param        $buttonGroup
     * @param string $template
     *
     * @return string
     */
    public function buttonsFunction($buttonGroup, $template = 'button-group')
    {
        $templates = [
            'button-group',
        ];

        if (in_array($template, $templates)) {
            $template = '@TangoManFront/'.$template.'.html.twig';
        }

        if (is_string($buttonGroup)) {
            $buttonGroup = json_decode($buttonGroup);
        }

        return $this->template->render(
            $template,
            [
                'buttonGroup' => $buttonGroup,
            ]
        );
    }

    /**
     * @param        $buttonGroup
     * @param string $template
     *
     * @return string
     */
    public function modalFunction($buttonGroup, $template = 'modal')
    {
        $templates = [
            'modal',
        ];

        if (in_array($template, $templates)) {
            $template = '@TangoManFront/'.$template.'.html.twig';
        }

        if (is_string($buttonGroup)) {
            $buttonGroup = json_decode($buttonGroup);
        }

        return $this->template->render(
            $template,
            [
                'buttonGroup' => $buttonGroup,
            ]
        );
    }

    /**
     * parse settings from button object
     *
     * @param \stdClass $button
     *
     * @return array / null
     */
    public function parseButtonFunction($button)
    {
        $button = json_decode(json_encode($button), true);

        // Set default values
        $result = ['tag' => 'a'];

        $flag = false;

        // Set default tag & type
        if (isset($button['type'])) {
            switch ($button['type']) {
                case 'button':
                case 'reset':
                case 'submit':
                    $result['tag'] = 'button';
                    $result['attributes'] = ['type' => $button['type']];
                    break;
                case 'dismiss':
                    $result['tag'] = 'button';
                    $result['data'] = ['dismiss' => 'modal'];
                    $result['attributes'] = ['type' => 'button'];
                    break;
            }
        }

        if (isset($button['toggle']) && !$flag) {
            $flag = true;
            $result['attributes'] = [
                'aria-pressed' => 'false',
                'autocomplete' => 'off',
            ];
            $result['data'] = [
                'toggle' => 'button',
            ];
        }

        if (isset($button['dropdown']) && !$flag) {
            $flag = true;
            $result['attributes'] = [
                'aria-haspopup' => 'true',
                'aria-expanded' => 'false',
            ];
            $result['data'] = [
                'toggle' => 'dropdown',
            ];
        }

        if (isset($button['collapse']) && !$flag) {
            $flag = true;
            $result['data'] = [
                'toggle' => 'collapse',
                'target' => $button['collapse'],
            ];
        }

        if (isset($button['modal']) && !$flag) {
            $flag = true;
            $result['tag'] = 'button';
            $result['attributes'] = ['rel' => 'modal'];
            $result['data'] = [
                'toggle' => 'modal',
                'target' => $button['modal'],
            ];
        }

        if (isset($button['popover']) && !$flag) {
            $flag = true;
            $result['tag'] = 'button';
            $result['data'] = [
                'toggle'    => 'popover',
                'placement' => 'top',
                'trigger'   => 'focus',
                'content'   => $button['popover'],
            ];
        }

        if (isset($button['tab']) && !$flag) {
            $flag = true;
            $result['attributes'] = ['role' => 'tab'];
            $result['data'] = ['toggle' => 'tab'];
        }

        if (isset($button['pill']) && !$flag) {
            $flag = true;
            $result['attributes'] = ['role' => 'tab'];
            $result['data'] = ['toggle' => 'pill'];
        }

        if ($flag) {
            if (isset($button['data']['toggle'])) {
                if ($button['data']['toggle'] == 'tooltip') {
                    $result['wrap'] = [
                        'toggle'         => 'tooltip',
                        'placement'      => $button['data']['placement'],
                        'original-title' => $button['data']['original-title'],
                    ];
                }
            }
        }

        if (isset($button['tooltip'])) {
            if ($flag) {
                $result['wrap'] = [
                    'toggle'         => 'tooltip',
                    'placement'      => 'top',
                    'original-title' => $button['tooltip'],
                ];
            } else {
                $result['data'] = [
                    'toggle'         => 'tooltip',
                    'placement'      => 'top',
                    'original-title' => $button['tooltip'],
                ];
            }
        }

        // User settings overrides default settings
        return array_merge($button, $result);
    }
}
