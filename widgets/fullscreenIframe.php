<?php

class Elementor_fullscreenIframe extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'fullscreenIframe';
    }

    public function get_title()
    {
        return esc_html__('Fullscreen Iframe', 'elementor-addon');
    }

    public function get_icon()
    {
        return 'eicon-code';
    }

    public function get_categories()
    {
        return ['basic'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'iframe_url',
            [
                'label' => esc_html__('Iframe URL', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::URL,
                'input_type' => 'url',
                'placeholder' => esc_html__('https://your-url.com', 'elementor-addon'),
            ]
        );

        $this->add_control(
            'height',
            [
                'label' => esc_html__('Iframe Height (px)', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 600,
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>

        <style>
            .fullscreen-iframe-section {
                display: flex;
                justify-content: center;
                align-items: center;
                position: relative;
                width: 100%;
                padding-left: 20px;
                padding-right: 20px;
            }

            .fullscreen-iframe {
                width: 100%;
                max-width: 1200px;
                border: none;
                padding-left: 20px;
                padding-right: 20px;
            }

            @media (max-width: 768px) {
                .fullscreen-iframe {
                    width: 100%;
                    height: 400px;
                }
            }
        </style>

        <div class="fullscreen-iframe-section">
            <iframe class="fullscreen-iframe" src="<?php echo esc_url($settings['iframe_url']['url']); ?>" height="<?php echo esc_attr($settings['height']); ?>"></iframe>
        </div>

<?php
    }
}
