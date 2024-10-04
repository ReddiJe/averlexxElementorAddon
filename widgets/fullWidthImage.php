<?php

class Elementor_FullscreenImageWithText extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'FullscreenImageWithText';
    }

    public function get_title()
    {
        return esc_html__('Fullscreen Image with Text', 'elementor-addon');
    }

    public function get_icon()
    {
        return 'eicon-image-box';
    }

    public function get_categories()
    {
        return ['basic'];
    }

    protected function register_controls()
    {
        // Content Section Start
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Image Control
        $this->add_control(
            'image',
            [
                'label' => esc_html__('Choose Image', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        // Text Control
        $this->add_control(
            'text',
            [
                'label' => esc_html__('Text', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Your text here', 'elementor-addon'),
            ]
        );

        $this->end_controls_section();
        // Content Section End
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>

        <style>
            .fullscreen-section {
                display: flex;
                position: relative;
                width: 100%;
                height: 100vh;
                justify-content: center;
                align-items: center;
            }

            .fullscreen-image {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: 0;
            }

            .fullscreen-image img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                filter: brightness(0.5);
            }

            .fullscreen-text {
                position: relative;
                z-index: 1;
                color: white;
                font-size: 2em;
                text-align: center;
            }

            @media (max-width: 768px) {
                .fullscreen-section {
                    flex-direction: column;
                }

                .fullscreen-text {
                    margin-top: 20px;
                    font-size: 1.5em;
                }
            }
        </style>

        <div class="fullscreen-section">
            <div class="fullscreen-image">
                <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="fullscreen image">
            </div>
            <div class="fullscreen-text">
                <p><?php echo esc_html($settings['text']); ?></p>
            </div>
        </div>

<?php
    }
}
