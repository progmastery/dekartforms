<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://aramkhachikyan.com
 * @since      1.0.0
 *
 * @package    Dekartforms
 * @subpackage Dekartforms/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Dekartforms
 * @subpackage Dekartforms/admin
 * @author     Aram Khachikyan <aram.khachikyan.a@gmail.com>
 */
class Dekartforms_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		
		add_action( 'admin_menu', array($this,'my_admin_menu') );

	}
	
	public function my_admin_menu() {
		add_menu_page( 'Dekart Forms', 'Dekart Forms', 'manage_options', 'dekartforms', array($this,'dekartforms_router'), 'dashicons-tickets', 25  );
	}

	public function dekartforms_router(){
		$task = filter_input(INPUT_GET, 'task', FILTER_SANITIZE_STRING);
		
		switch($task) {
			case "add_form": 
				echo 'add form'; 
				break;
			case "edit_form":
				echo 'edit';
				break;
			case "delete_form":
				echo 'delete';
				break;
			case "form_entries":
				echo "entries";
				break;
			case "single_entry":
				echo "single";
				break;
			case "delete_entry":
				echo 'delete entry';
				break;
			default: 
				$this->show_forms();
		}
	}	
	
	/**
	 * Show form list
	 *
	 * @since    1.0.0
	 */	
	public function show_forms() {
		
		?>
		<div class="wrap">
			<h2>Forms</h2>
			<table class="widefat" id="testme_admin_list">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Form</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody id="the-list">

                <tr class="alternate">
					<td>1</td>
					<td>1</td>
					<td>
						<a href="">Entries</a> | 
						<a href=""><span>Edit</a> | 
						<a href=""><span>Delete</a>
					</td>
				</tr>
            </tbody>
        </table>
		</div>
		
		<?php		
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Dekartforms_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Dekartforms_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/dekartforms-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Dekartforms_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Dekartforms_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/dekartforms-admin.js', array( 'jquery' ), $this->version, false );

	}

}
