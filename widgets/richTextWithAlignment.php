<?php

class Elementor_RichTextWithAlignment extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'richTextWithAlignment';
    }

    public function get_title()
    {
        return esc_html__('Rich Text with Alignment', 'elementor-addon');
    }

    public function get_icon()
    {
        return 'eicon-text';
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
            'title',
            [
                'label' => esc_html__('Title', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Your Title Here', 'elementor-addon'),
            ]
        );

        $this->add_control(
            'content',
            [
                'label' => esc_html__('Content', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => esc_html__('Your content here', 'elementor-addon'),
            ]
        );

        $this->add_control(
            'alignment',
            [
                'label' => esc_html__('Alignment', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'elementor-addon'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'elementor-addon'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'elementor-addon'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $alignment = $settings['alignment'];

?>
        <style>
            .rich-text-section {
                text-align: <?php echo esc_attr($alignment); ?>;
                margin: 20px;
                padding: 0px 150px;
                width: 90%;
            }

            .rich-text-title {
                font-size: 1.5em;
                margin-bottom: 10px;
            }

            .rich-text-content {
                font-size: 1em;
            }

            @media screen and (max-width: 768px) {
                .rich-text-section {
                    margin: 10px;
                    padding: 0px 25px;
                }
            }
        </style>

        <div class="rich-text-section">
            <h2 class="rich-text-title"><?php echo esc_html($settings['title']); ?></h2>
            <div class="rich-text-content"><?php echo wp_kses_post($settings['content']); ?></div>
        </div>

<?php
    }
}
