<?php
include_once ABSPATH . 'wp-includes/class-wp-customize-control.php';
// Enqueue our scripts
function us_customize_controls_scripts()
{
  $version = wp_get_theme()->get('Version');
  wp_enqueue_script('us-customize-controls', get_theme_file_uri('/upsites/customizer-controls/js/us-customize-controls.js'), array(), $version, true);
}
add_action('customize_controls_enqueue_scripts', 'us_customize_controls_scripts');

// Enqueue our styles
function us_customize_controls_styles()
{
  $version = wp_get_theme()->get('Version');
  wp_enqueue_style('us-customize-controls', get_theme_file_uri('/upsites/customizer-controls/css/us-customize-controls.css'), array(), $version);
}
add_action('customize_controls_print_styles', 'us_customize_controls_styles');

if (class_exists('WP_Customize_Panel')) {
  class US_WP_Customize_Panel extends WP_Customize_Panel
  {
    public $panel;
    public $type = 'pe_panel';
    public function json()
    {
      $array = wp_array_slice_assoc((array) $this, array('id', 'description', 'priority', 'type', 'panel',));
      $array['title'] = html_entity_decode($this->title, ENT_QUOTES, get_bloginfo('charset'));
      $array['content'] = $this->get_content();
      $array['active'] = $this->active();
      $array['instanceNumber'] = $this->instance_number;
      return $array;
    }
  }
}

if (class_exists('WP_Customize_Section')) {
  class US_WP_Customize_Section extends WP_Customize_Section
  {
    public $section;
    public $type = 'pe_section';
    public function json()
    {
      $array = wp_array_slice_assoc((array) $this, array('id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section',));
      $array['title'] = html_entity_decode($this->title, ENT_QUOTES, get_bloginfo('charset'));
      $array['content'] = $this->get_content();
      $array['active'] = $this->active();
      $array['instanceNumber'] = $this->instance_number;

      if ($this->panel) {
        $array['customizeAction'] = sprintf('Customizing &#9656; %s', esc_html($this->manager->get_panel($this->panel)->title));
      } else {
        $array['customizeAction'] = 'Customizing';
      }
      return $array;
    }
  }
}

if (!class_exists('US_Separator_Control')) {
  class US_Separator_Control extends WP_Customize_Control
  {
    public function render_content()
    {
      echo '<hr>';
    }
  }
}

class upsite_Dropdown_Select2_Custom_Control extends WP_Customize_Control
{
  /**
   * The type of control being rendered
   */
  public $type = 'dropdown_select2';
  /**
   * The type of Select2 Dropwdown to display. Can be either a single select dropdown or a multi-select dropdown. Either false for true. Default = false
   */
  private $multiselect = false;
  /**
   * The Placeholder value to display. Select2 requires a Placeholder value to be set when using the clearall option. Default = 'Please select...'
   */
  private $placeholder = 'Please select...';
  /**
   * Constructor
   */
  public function __construct($manager, $id, $args = array(), $options = array())
  {
    parent::__construct($manager, $id, $args);
    // Check if this is a multi-select field
    if (isset($this->input_attrs['multiselect']) && $this->input_attrs['multiselect']) {
      $this->multiselect = true;
    }
    // Check if a placeholder string has been specified
    if (isset($this->input_attrs['placeholder']) && $this->input_attrs['placeholder']) {
      $this->placeholder = $this->input_attrs['placeholder'];
    }
  }
  /**
   * Enqueue our scripts and styles
   */
  public function enqueue()
  {
    wp_enqueue_script('upsite-select2-js', get_theme_file_uri('/upsites/customizer-controls/js/select2.full.min.js'), array('jquery'), '4.1.0', true);
    wp_enqueue_script('upsite-controls-js', get_theme_file_uri('/upsites/customizer-controls/js/customizer.js'), array('upsite-select2-js'), '1.2', true);
    wp_enqueue_style('upsite-controls-css', get_theme_file_uri('/upsites/customizer-controls/css/customizer.css'), array(), '1.3', 'all');
    wp_enqueue_style('upsite-select2-css', get_theme_file_uri('/upsites/customizer-controls/css/select2.min.css'), array(), '4.0.13', 'all');
  }
  /**
   * Render the control in the customizer
   */
  public function render_content()
  {
    $defaultValue = $this->value();
    if ($this->multiselect) {
      $defaultValue = explode(',', $this->value());
    }
?>
    <div class="dropdown_select2_control">
      <?php if (!empty($this->label)) { ?>
        <label for="<?php echo esc_attr($this->id); ?>" class="customize-control-title">
          <?php echo esc_html($this->label); ?>
        </label>
      <?php } ?>
      <?php if (!empty($this->description)) { ?>
        <span class="customize-control-description"><?php echo esc_html($this->description); ?></span>
      <?php } ?>
      <input type="hidden" id="<?php echo esc_attr($this->id); ?>" class="customize-control-dropdown-select2" value="<?php echo esc_attr($this->value()); ?>" name="<?php echo esc_attr($this->id); ?>" <?php $this->link(); ?> />
      <select name="select2-list-<?php echo ($this->multiselect ? 'multi[]' : 'single'); ?>" class="customize-control-select2" data-placeholder="<?php echo $this->placeholder; ?>" <?php echo ($this->multiselect ? 'multiple="multiple" ' : ''); ?>>
        <?php
        if (!$this->multiselect) {
          // When using Select2 for single selection, the Placeholder needs an empty <option> at the top of the list for it to work (multi-selects dont need this)
          echo '<option></option>';
        }
        foreach ($this->choices as $key => $value) {
          if (is_array($value)) {
            echo '<optgroup label="' . esc_attr($key) . '">';
            foreach ($value as $optgroupkey => $optgroupvalue) {
              if ($this->multiselect) {
                echo '<option value="' . esc_attr($optgroupkey) . '" ' . (in_array(esc_attr($optgroupkey), $defaultValue) ? 'selected="selected"' : '') . '>' . esc_attr($optgroupvalue) . '</option>';
              } else {
                echo '<option value="' . esc_attr($optgroupkey) . '" ' . selected(esc_attr($optgroupkey), $defaultValue, false)  . '>' . esc_attr($optgroupvalue) . '</option>';
              }
            }
            echo '</optgroup>';
          } else {
            if ($this->multiselect) {
              echo '<option value="' . esc_attr($key) . '" ' . (in_array(esc_attr($key), $defaultValue) ? 'selected="selected"' : '') . '>' . esc_attr($value) . '</option>';
            } else {
              echo '<option value="' . esc_attr($key) . '" ' . selected(esc_attr($key), $defaultValue, false)  . '>' . esc_attr($value) . '</option>';
            }
          }
        }
        ?>
      </select>
    </div>
<?php
  }
}
