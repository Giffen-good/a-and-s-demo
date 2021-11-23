<?php
/**
 * as_demo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package as_demo
 */

if ( ! defined( '_S_VERSION' ) )
{
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'as_demo_setup' ) )
{

	function as_demo_setup()
	{

		load_theme_textdomain( 'as_demo', get_template_directory() . '/languages' );

		add_theme_support( 'title-tag' );
		add_theme_support( 'editor-font-sizes' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support('menus');

		add_image_size( 'custom_post_image', 500, 500 );


		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'as_demo' ),
			)
		);

	}
}
add_action( 'after_setup_theme', 'as_demo_setup' );

/**
 * Enqueue scripts and styles.
 */
function as_demo_scripts()
{
	wp_enqueue_style( 'as_demo-styles', get_template_directory_uri().'/css/theme.css', array(),  _S_VERSION );
	wp_style_add_data( 'as_demo-styles', 'rtl', 'replace' );
}
add_action( 'wp_enqueue_scripts', 'as_demo_scripts' );



/* utils */
function console_log( $data )
{
	echo '<script>console.log(' . json_encode( $data ) . ');</script>';
}

function get_featured_image( $id, $size = 'custom_post_size')
{
	return  array(
		"image_src" => wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'custom_post_image' ),
		"image_alt" =>  get_post_meta( $id, '_wp_attachment_image_alt', true)
	);
}









/* Resp picture Object. Designed for quickly creating markup for responsive <picture> */
class Resp_Picture_helper
{
	public array $img;
	public array $sources;
	public array $fallback;
	public ?string $classes = '';

	function __construct( array $img, bool $is_acf = false )
	{
		$this->img = $img;
		if ( $is_acf )
		{
			$this->create_default_acf_img_props();
		}
	}

	public function create_picture()
	{
		ob_start();
		?>
		<picture>
			<?php
			foreach( $this->sources as $s )
			{
				$srcset = $s['srcset'];
				$media = $s['media'];
				?>
				<source srcset="<?php esc_attr_e( $srcset ); ?>" media="<?php esc_attr_e( $media ); ?>">
				<?php
			}
			?>
			<img
				class="<?php esc_attr_e( $this->classes ); ?>"
				src="<?php esc_attr_e( $this->fallback['src'] ); ?>"
				alt="<?php esc_attr_e( $this->fallback['alt']); ?>" />
		</picture>

		<?php
		$output = ob_get_contents(); // collect output
		ob_end_clean(); // Turn off ouput buffer
		return $output;
	}

	public function c_classes_bg_img() {
		$this->classes = 'absolute w-full h-full inset-0 object-cover';
	}

	// generates image attributes (source and media) for standard acf img type to be used in create_picture()
	public function create_default_acf_img_props()
	{
		$img = $this->img;
		$this->sources = array(
			array(
				'srcset' => $img['sizes']['2048x2048'],
				'media' => '(min-width: 1000px)'
			),
			array(
				'srcset' => $img['sizes']['large'],
				'media' => '(min-width: 800px)'
			)
		);
	 	$this->fallback = array(
				'alt' => $img['alt'],
				'src' => $img['sizes']['large']
		);
	}
}
