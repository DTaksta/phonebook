<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faker extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // can only be called from the command line
        if (!$this->input->is_cli_request()) {
            exit('Direct access is not allowed');
        }

        // can only be run in the development environment
        if (ENVIRONMENT !== 'development') {
            exit('Wowsers! You don\'t want to do that!');
        }

        // initiate faker
        $this->faker = Faker\Factory::create();

        // load required model
        $this->load->model('phonebook_model');
    }

    /**
     * seed local database
     */
    function seed()
    {
        // purge existing data
        $this->_truncate_db();

        // seed users
        $this->_seed_records(25);

        // call more seeds here...
    }

    /**
     * seed users
     *
     * @param int $limit
     */
    function _seed_records($limit)
    {
        echo "seeding $limit users";

        // create a bunch of base buyer accounts
        for ($i = 0; $i < $limit; $i++) {
            echo ".";

            $data = array(
                'name' => $this->faker->name,
                'email' => $this->faker->email,
                'phone' => $this->faker->phoneNumber,
            );

            $this->phonebook_model->create($data);
        }

        echo PHP_EOL;
    }

    private function _truncate_db()
    {
        $this->phonebook_model->truncate();
    }


}
