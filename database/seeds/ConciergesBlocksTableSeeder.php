<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConciergesBlocksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();
        $this->truncate('concierges_blocks');

        $codification_periodes = \App\Models\CodificationPeriode::all();
        $users = User::with('role')->get();
        $concierges = $users->filter(function ($user) {
            return $user->role->name === 'concierge';
        });
        $blocks = \App\Models\Block::all();

        $concierges_blocks = [];

        foreach ($codification_periodes as $codification_periode) {
            $concierges_block = [];
            $concierges_block['codification_periode'] = $codification_periode->id;
            $concierges_block['concierge_id'] = $concierges->random()->id;
            $concierges_block['block_id'] = $blocks->random()->id;
        }

        DB::table('concierges_blocks')->insert($concierges_blocks);

        $this->enableForeignKeys();
    }
}
