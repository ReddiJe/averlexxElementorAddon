<?php

class Elementor_fullscreenImageWithText extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'fullscreenImageWithText';
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
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

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

        $this->add_control(
            'text',
            [
                'label' => esc_html__('Text', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Your text here', 'elementor-addon'),
            ]
        );

        $this->end_controls_section();
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
                min-height: 100vh;
                justify-content: center;
                align-items: center;
                margin-bottom: 50px;
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
                text-align: center;
            }

            @media (max-width: 768px) {
                .fullscreen-section {
                    flex-direction: column;
                    height: auto;
                    position: relative;
                    min-height: 50vh;
                    margin-bottom: 25px;
                }

                .fullscreen-image {
                    position: relative;
                    height: auto;
                }

                .fullscreen-image img {
                    height: auto;
                    max-height: 50vh;
                    width: 100%;
                }

                .fullscreen-text {
                    margin-top: 20px;
                    font-size: 1.5em;
                }

                .fullscreen-text p {
                    color: #2c2d2c;
                }
            }

            @media (min-width: 769px) {
                .fullscreen-text p{
                    font-size: 3em;
                    color: #fff;
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
