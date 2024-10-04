class Elementor_switchSideImage extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'switchSideImage';
    }

    public function get_title()
    {
        return esc_html__('Switch Side Image', 'elementor-addon');
    }

    public function get_icon()
    {
        return 'eicon-code';
    }

    public function get_categories()
    {
        return ['basic'];
    }

    public function get_keywords()
    {
        return ['hello', 'world'];
    }

    protected function register_controls()
    {
        // Content Tab Start
        $this->start_controls_section(
            'section_title',
            [
                'label' => esc_html__('Title', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );

        $this->add_control(
            'text',
            [
                'label' => esc_html__('Text', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => esc_html__('Choose Image', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'switch_position',
            [
                'label' => esc_html__('Switch Image Position', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Right', 'elementor-addon'),
                'label_off' => esc_html__('Left', 'elementor-addon'),
                'default' => 'left',
            ]
        );

        $this->add_control(
            'textForButton',
            [
                'label' => esc_html__('Text For Button', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__('insert text for button', 'elementor-addon'),
            ]
        );

        $this->add_control(
            'url',
            [
                'label' => esc_html__('URL to embed', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'input_type' => 'url',
                'placeholder' => esc_html__('https://your-link.com', 'elementor-addon'),
            ]
        );

        // New Control for Button Alignment
        $this->add_control(
            'button_alignment',
            [
                'label' => esc_html__('Button Alignment', 'elementor-addon'),
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
                'default' => 'left',
                'toggle' => true,
            ]
        );

        $this->end_controls_section();
        // Content Tab End

        // Style Tab Start
        $this->start_controls_section(
            'section_title_style',
            [
                'label' => esc_html__('Title', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Text Color', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hello-world' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
        // Style Tab End
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>
        <style>
            /* CSS code remains unchanged */
            /* Add your existing styles here */
            .buttonHeroSection {
                display: block;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                outline: none;
                gap: 0.625rem;
                background: var(--blueLight);
                box-shadow: 0px 0px 4px 0px rgba(0, 0, 0, 0.25);
                color: #fff;
                font-weight: 400;
                padding: 10px;
                border-radius: 15px;
                transition: all linear 300ms;
                /* Align the button based on the selected alignment */
                text-align: <?php echo esc_attr($settings['button_alignment']); ?>;
            }
        </style>

        <div class="heroSection <?php
                                    if ('yes' === $settings['switch_position']) {
                                        echo 'right';
                                    } else {
                                        echo 'left';
                                    }
                                    ?> pageWidth">
            <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="" class="left">
            <div class="heroText">
                <h1>
                    <?php echo $settings['title']; ?>
                </h1>
                <p>
                    <?php echo $settings['text']; ?>
                </p>
                <?php if ($settings['url'] != "") {
                ?>
                    <div class="buttonHeroSection">
                        <a class="buttonBlueBg" href="<?php echo esc_url($settings['url']); ?>">
                            <?php echo esc_html($settings['textForButton']); ?>
                        </a>
                    </div>
                <?php
                }
                ?>
            </div>
            <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="" class="right">
        </div>
<?php
    }
}
