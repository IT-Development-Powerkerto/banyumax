<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class LeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $n=1;
        //input lead campaign 1
        for ($i=1; $i<=268; $i++){
            $lead = [
                [
                'admin_id'    => 2,
                'advertiser'  => 'Hanif',
                'operator_id' => 1,
                'campaign_id' => 1,
                'client_id'   => $n,
                'product_id'  => 5,
                'user_id'     => 32,
                'quantity'    => null,
                'price'       => 250000,
                'total_price' => null,
                'status_id'   => 3,
                'created_at'  => date('Y-m-d', strtotime('- 1 month')),
                'updated_at'  => date('Y-m-d', strtotime('- 1 month')),
                ],
            ];
            $client = [
                [
                'admin_id'      => 2,
                'campaign_id'   => 1,
                'name'          => null,
                'whatsapp'      => null,
                'created_at'  => date('Y-m-d', strtotime('- 1 month')),
                'updated_at'  => date('Y-m-d', strtotime('- 1 month')),
                ],
            ];
            DB::table('leads')->insert($lead);
            DB::table('clients')->insert($client);
            $n+=1;
        }
        //set status closing & quantity
        for($i=$n-268; $i<$n-268+142; $i++){
            DB::table('leads')->where('id', $i)->update([
                'quantity'    => 1,
                'total_price' => 1*250000,
                'status_id'   => 5,
                'updated_at' => date('Y-m-d', strtotime('- 1 month')),
            ]);
        }
        //add quantity
        for($i=$n-268; $i<$n-268+8; $i++){
            DB::table('leads')->where('id', $i)->update([
                'quantity'    => 2,
                'total_price' => 2*250000,
                'updated_at' => date('Y-m-d', strtotime('- 1 month')),
            ]);
        }

        for ($i=1; $i<=175; $i++){
            $lead = [
                [
                'admin_id'    => 2,
                'advertiser'  => 'Hanif',
                'operator_id' => 2,
                'campaign_id' => 1,
                'client_id'   => $n,
                'product_id'  => 5,
                'user_id'     => 33,
                'quantity'    => null,
                'price'       => 250000,
                'total_price' => null,
                'status_id'   => 3,
                'created_at'  => date('Y-m-d', strtotime('- 1 month')),
                'updated_at'  => date('Y-m-d', strtotime('- 1 month')),
                ],
            ];
            $client = [
                [
                'admin_id'      => 2,
                'campaign_id'   => 1,
                'name'          => null,
                'whatsapp'      => null,
                'created_at'  => date('Y-m-d', strtotime('- 1 month')),
                'updated_at'  => date('Y-m-d', strtotime('- 1 month')),
                ],
            ];
            DB::table('leads')->insert($lead);
            DB::table('clients')->insert($client);
            $n+=1;
        }

        for($i=$n-175; $i<$n-175+79; $i++){
            DB::table('leads')->where('id', $i)->update([
                'quantity'    => 1,
                'total_price' => 1*250000,
                'status_id'   => 5,
                'updated_at' => date('Y-m-d', strtotime('- 1 month')),
            ]);
        }

        for($i=$n-175; $i<$n-175+8; $i++){
            DB::table('leads')->where('id', $i)->update([
                'quantity'    => 2,
                'total_price' => 2*250000,
                'updated_at' => date('Y-m-d', strtotime('- 1 month')),
            ]);
        }

        for ($i=1; $i<=200; $i++){
            $lead = [
                [
                'admin_id'    => 2,
                'advertiser'  => 'Hanif',
                'operator_id' => 4,
                'campaign_id' => 1,
                'client_id'   => $n,
                'product_id'  => 5,
                'user_id'     => 18,
                'quantity'    => null,
                'price'       => 250000,
                'total_price' => null,
                'status_id'   => 3,
                'created_at'  => date('Y-m-d', strtotime('- 1 month')),
                'updated_at'  => date('Y-m-d', strtotime('- 1 month')),
                ],
            ];
            $client = [
                [
                'admin_id'      => 2,
                'campaign_id'   => 1,
                'name'          => null,
                'whatsapp'      => null,
                'created_at'  => date('Y-m-d', strtotime('- 1 month')),
                'updated_at'  => date('Y-m-d', strtotime('- 1 month')),
                ],
            ];
            DB::table('leads')->insert($lead);
            DB::table('clients')->insert($client);
            $n+=1;
        }

        for($i=$n-200; $i<$n-200+118; $i++){
            DB::table('leads')->where('id', $i)->update([
                'quantity'    => 1,
                'total_price' => 1*250000,
                'status_id'   => 5,
                'updated_at' => date('Y-m-d', strtotime('- 1 month')),
            ]);
        }

        for($i=$n-200; $i<$n-200+15; $i++){
            DB::table('leads')->where('id', $i)->update([
                'quantity'    => 2,
                'total_price' => 2*250000,
                'updated_at' => date('Y-m-d', strtotime('- 1 month')),
            ]);
        }

        for ($i=1; $i<=209; $i++){
            $lead = [
                [
                'admin_id'    => 2,
                'advertiser'  => 'Hanif',
                'operator_id' => 5,
                'campaign_id' => 1,
                'client_id'   => $n,
                'product_id'  => 5,
                'user_id'     => 22,
                'quantity'    => null,
                'price'       => 250000,
                'total_price' => null,
                'status_id'   => 3,
                'created_at'  => date('Y-m-d', strtotime('- 1 month')),
                'updated_at'  => date('Y-m-d', strtotime('- 1 month')),
                ],
            ];
            $client = [
                [
                'admin_id'      => 2,
                'campaign_id'   => 1,
                'name'          => null,
                'whatsapp'      => null,
                'created_at'  => date('Y-m-d', strtotime('- 1 month')),
                'updated_at'  => date('Y-m-d', strtotime('- 1 month')),
                ],
            ];
            DB::table('leads')->insert($lead);
            DB::table('clients')->insert($client);
            $n+=1;
        }

        for($i=$n-209; $i<$n-209+117; $i++){
            DB::table('leads')->where('id', $i)->update([
                'quantity'    => 1,
                'total_price' => 1*250000,
                'status_id'   => 5,
                'updated_at' => date('Y-m-d', strtotime('- 1 month')),
            ]);
        }

        for($i=$n-209; $i<$n-209+9; $i++){
            DB::table('leads')->where('id', $i)->update([
                'quantity'    => 2,
                'total_price' => 2*250000,
                'updated_at' => date('Y-m-d', strtotime('- 1 month')),
            ]);
        }

        for ($i=1; $i<=193; $i++){
            $lead = [
                [
                'admin_id'    => 2,
                'advertiser'  => 'Hanif',
                'operator_id' => 6,
                'campaign_id' => 1,
                'client_id'   => $n,
                'product_id'  => 5,
                'user_id'     => 23,
                'quantity'    => null,
                'price'       => 250000,
                'total_price' => null,
                'status_id'   => 3,
                'created_at'  => date('Y-m-d', strtotime('- 1 month')),
                'updated_at'  => date('Y-m-d', strtotime('- 1 month')),
                ],
            ];
            $client = [
                [
                'admin_id'      => 2,
                'campaign_id'   => 1,
                'name'          => null,
                'whatsapp'      => null,
                'created_at'  => date('Y-m-d', strtotime('- 1 month')),
                'updated_at'  => date('Y-m-d', strtotime('- 1 month')),
                ],
            ];
            DB::table('leads')->insert($lead);
            DB::table('clients')->insert($client);
            $n+=1;
        }

        for($i=$n-193; $i<$n-193+107; $i++){
            DB::table('leads')->where('id', $i)->update([
                'quantity'    => 1,
                'total_price' => 1*250000,
                'status_id'   => 5,
                'updated_at' => date('Y-m-d', strtotime('- 1 month')),
            ]);
        }

        for($i=$n-193; $i<$n-193+6; $i++){
            DB::table('leads')->where('id', $i)->update([
                'quantity'    => 2,
                'total_price' => 2*250000,
                'updated_at' => date('Y-m-d', strtotime('- 1 month')),
            ]);
        }

        for ($i=1; $i<=230; $i++){
            $lead = [
                [
                'admin_id'    => 2,
                'advertiser'  => 'Hanif',
                'operator_id' => 7,
                'campaign_id' => 2,
                'client_id'   => $n,
                'product_id'  => 1,
                'user_id'     => 35,
                'quantity'    => null,
                'price'       => 375000,
                'total_price' => null,
                'status_id'   => 3,
                'created_at'  => date('Y-m-d', strtotime('- 1 month')),
                'updated_at'  => date('Y-m-d', strtotime('- 1 month')),
                ],
            ];
            $client = [
                [
                'admin_id'      => 2,
                'campaign_id'   => 2,
                'name'          => null,
                'whatsapp'      => null,
                'created_at'  => date('Y-m-d', strtotime('- 1 month')),
                'updated_at'  => date('Y-m-d', strtotime('- 1 month')),
                ],
            ];
            DB::table('leads')->insert($lead);
            DB::table('clients')->insert($client);
            $n+=1;
        }

        for($i=$n-230; $i<$n-230+184; $i++){
            DB::table('leads')->where('id', $i)->update([
                'quantity'    => 1,
                'total_price' => 1*375000,
                'status_id'   => 5,
                'updated_at' => date('Y-m-d', strtotime('- 1 month')),
            ]);
        }

        for ($i=1; $i<=2; $i++){
            $lead = [
                [
                'admin_id'    => 2,
                'advertiser'  => 'Hanif',
                'operator_id' => 8,
                'campaign_id' => 2,
                'client_id'   => $n,
                'product_id'  => 1,
                'user_id'     => 24,
                'quantity'    => null,
                'price'       => 375000,
                'total_price' => null,
                'status_id'   => 3,
                'created_at'  => date('Y-m-d', strtotime('- 1 month')),
                'updated_at'  => date('Y-m-d', strtotime('- 1 month')),
                ],
            ];
            $client = [
                [
                'admin_id'      => 2,
                'campaign_id'   => 2,
                'name'          => null,
                'whatsapp'      => null,
                'created_at'  => date('Y-m-d', strtotime('- 1 month')),
                'updated_at'  => date('Y-m-d', strtotime('- 1 month')),
                ],
            ];
            DB::table('leads')->insert($lead);
            DB::table('clients')->insert($client);
            $n+=1;
        }

        for($i=$n-2; $i<$n-2+2; $i++){
            DB::table('leads')->where('id', $i)->update([
                'quantity'    => 1,
                'total_price' => 1*375000,
                'status_id'   => 5,
                'updated_at' => date('Y-m-d', strtotime('- 1 month')),
            ]);
        }

        for ($i=1; $i<=75; $i++){
            $lead = [
                [
                'admin_id'    => 2,
                'advertiser'  => 'Hanif',
                'operator_id' => 9,
                'campaign_id' => 2,
                'client_id'   => $n,
                'product_id'  => 1,
                'user_id'     => 21,
                'quantity'    => null,
                'price'       => 375000,
                'total_price' => null,
                'status_id'   => 3,
                'created_at'  => date('Y-m-d', strtotime('- 1 month')),
                'updated_at'  => date('Y-m-d', strtotime('- 1 month')),
                ],
            ];
            $client = [
                [
                'admin_id'      => 2,
                'campaign_id'   => 2,
                'name'          => null,
                'whatsapp'      => null,
                'created_at'  => date('Y-m-d', strtotime('- 1 month')),
                'updated_at'  => date('Y-m-d', strtotime('- 1 month')),
                ],
            ];
            DB::table('leads')->insert($lead);
            DB::table('clients')->insert($client);
            $n+=1;
        }

        for($i=$n-75; $i<$n-75+53; $i++){
            DB::table('leads')->where('id', $i)->update([
                'quantity'    => 1,
                'total_price' => 1*375000,
                'status_id'   => 5,
                'updated_at' => date('Y-m-d', strtotime('- 1 month')),
            ]);
        }

        for($i=$n-75; $i<$n-75+1; $i++){
            DB::table('leads')->where('id', $i)->update([
                'quantity'    => 2,
                'total_price' => 2*375000,
                'updated_at' => date('Y-m-d', strtotime('- 1 month')),
            ]);
        }

        for ($i=1; $i<=2; $i++){
            $lead = [
                [
                'admin_id'    => 2,
                'advertiser'  => 'Hanif',
                'operator_id' => 13,
                'campaign_id' => 3,
                'client_id'   => $n,
                'product_id'  => 3,
                'user_id'     => 34,
                'quantity'    => null,
                'price'       => 68000,
                'total_price' => null,
                'status_id'   => 3,
                'created_at'  => date('Y-m-d', strtotime('- 1 month')),
                'updated_at'  => date('Y-m-d', strtotime('- 1 month')),
                ],
            ];
            $client = [
                [
                'admin_id'      => 2,
                'campaign_id'   => 3,
                'name'          => null,
                'whatsapp'      => null,
                'created_at'  => date('Y-m-d', strtotime('- 1 month')),
                'updated_at'  => date('Y-m-d', strtotime('- 1 month')),
                ],
            ];
            DB::table('leads')->insert($lead);
            DB::table('clients')->insert($client);
            $n+=1;
        }

        for($i=$n-2; $i<$n-2+2; $i++){
            DB::table('leads')->where('id', $i)->update([
                'quantity'    => 1,
                'total_price' => 1*68000,
                'status_id'   => 5,
                'updated_at' => date('Y-m-d', strtotime('- 1 month')),
            ]);
        }

        for($i=$n-2; $i<$n-2+2; $i++){
            DB::table('leads')->where('id', $i)->update([
                'quantity'    => 2,
                'total_price' => 2*68000,
                'updated_at' => date('Y-m-d', strtotime('- 1 month')),
            ]);
        }

        for ($i=1; $i<=30; $i++){
            $lead = [
                [
                'admin_id'    => 2,
                'advertiser'  => 'Rifan',
                'operator_id' => 15,
                'campaign_id' => 4,
                'client_id'   => $n,
                'product_id'  => 1,
                'user_id'     => 17,
                'quantity'    => null,
                'price'       => 375000,
                'total_price' => null,
                'status_id'   => 3,
                'created_at'  => date('Y-m-d', strtotime('- 1 month')),
                'updated_at'  => date('Y-m-d', strtotime('- 1 month')),
                ],
            ];
            $client = [
                [
                'admin_id'      => 2,
                'campaign_id'   => 4,
                'name'          => null,
                'whatsapp'      => null,
                'created_at'  => date('Y-m-d', strtotime('- 1 month')),
                'updated_at'  => date('Y-m-d', strtotime('- 1 month')),
                ],
            ];
            DB::table('leads')->insert($lead);
            DB::table('clients')->insert($client);
            $n+=1;
        }

        for($i=$n-30; $i<$n-30+21; $i++){
            DB::table('leads')->where('id', $i)->update([
                'quantity'    => 1,
                'total_price' => 1*375000,
                'status_id'   => 5,
                'updated_at' => date('Y-m-d', strtotime('- 1 month')),
            ]);
        }

        for ($i=1; $i<=193; $i++){
            $lead = [
                [
                'admin_id'    => 2,
                'advertiser'  => 'Rifan',
                'operator_id' => 18,
                'campaign_id' => 5,
                'client_id'   => $n,
                'product_id'  => 3,
                'user_id'     => 36,
                'quantity'    => null,
                'price'       => 68000,
                'total_price' => null,
                'status_id'   => 3,
                'created_at'  => date('Y-m-d', strtotime('- 1 month')),
                'updated_at'  => date('Y-m-d', strtotime('- 1 month')),
                ],
            ];
            $client = [
                [
                'admin_id'      => 2,
                'campaign_id'   => 5,
                'name'          => null,
                'whatsapp'      => null,
                'created_at'  => date('Y-m-d', strtotime('- 1 month')),
                'updated_at'  => date('Y-m-d', strtotime('- 1 month')),
                ],
            ];
            DB::table('leads')->insert($lead);
            DB::table('clients')->insert($client);
            $n+=1;
        }

        for($i=$n-193; $i<$n-193+124; $i++){
            DB::table('leads')->where('id', $i)->update([
                'quantity'    => 1,
                'total_price' => 1*68000,
                'status_id'   => 5,
                'updated_at' => date('Y-m-d', strtotime('- 1 month')),
            ]);
        }

        for($i=$n-193; $i<$n-193+101; $i++){
            DB::table('leads')->where('id', $i)->update([
                'quantity'    => 2,
                'total_price' => 2*68000,
                'updated_at' => date('Y-m-d', strtotime('- 1 month')),
            ]);
        }

        for ($i=1; $i<=101; $i++){
            $lead = [
                [
                'admin_id'    => 2,
                'advertiser'  => 'Awal',
                'operator_id' => 20,
                'campaign_id' => 6,
                'client_id'   => $n,
                'product_id'  => 1,
                'user_id'     => 20,
                'quantity'    => null,
                'price'       => 375000,
                'total_price' => null,
                'status_id'   => 3,
                'created_at'  => date('Y-m-d', strtotime('- 1 month')),
                'updated_at'  => date('Y-m-d', strtotime('- 1 month')),
                ],
            ];
            $client = [
                [
                'admin_id'      => 2,
                'campaign_id'   => 6,
                'name'          => null,
                'whatsapp'      => null,
                'created_at'  => date('Y-m-d', strtotime('- 1 month')),
                'updated_at'  => date('Y-m-d', strtotime('- 1 month')),
                ],
            ];
            DB::table('leads')->insert($lead);
            DB::table('clients')->insert($client);
            $n+=1;
        }

        for($i=$n-101; $i<$n-101+78; $i++){
            DB::table('leads')->where('id', $i)->update([
                'quantity'    => 1,
                'total_price' => 1*375000,
                'status_id'   => 5,
                'updated_at' => date('Y-m-d', strtotime('- 1 month')),
            ]);
        }

        for($i=$n-101; $i<$n-101+6; $i++){
            DB::table('leads')->where('id', $i)->update([
                'quantity'    => 2,
                'total_price' => 2*375000,
                'updated_at' => date('Y-m-d', strtotime('- 1 month')),
            ]);
        }

        for ($i=1; $i<=250; $i++){
            $lead = [
                [
                'admin_id'    => 2,
                'advertiser'  => 'Awal',
                'operator_id' => 22,
                'campaign_id' => 7,
                'client_id'   => $n,
                'product_id'  => 3,
                'user_id'     => 16,
                'quantity'    => null,
                'price'       => 68000,
                'total_price' => null,
                'status_id'   => 3,
                'created_at'  => date('Y-m-d', strtotime('- 1 month')),
                'updated_at'  => date('Y-m-d', strtotime('- 1 month')),
                ],
            ];
            $client = [
                [
                'admin_id'      => 2,
                'campaign_id'   => 7,
                'name'          => null,
                'whatsapp'      => null,
                'created_at'  => date('Y-m-d', strtotime('- 1 month')),
                'updated_at'  => date('Y-m-d', strtotime('- 1 month')),
                ],
            ];
            DB::table('leads')->insert($lead);
            DB::table('clients')->insert($client);
            $n+=1;
        }

        for($i=$n-250; $i<$n-250+166; $i++){
            DB::table('leads')->where('id', $i)->update([
                'quantity'    => 1,
                'total_price' => 1*68000,
                'status_id'   => 5,
                'updated_at' => date('Y-m-d', strtotime('- 1 month')),
            ]);
        }

        for($i=$n-250; $i<$n-250+127; $i++){
            DB::table('leads')->where('id', $i)->update([
                'quantity'    => 2,
                'total_price' => 2*68000,
                'updated_at' => date('Y-m-d', strtotime('- 1 month')),
            ]);
        }

        for ($i=1; $i<=227; $i++){
            $lead = [
                [
                'admin_id'    => 2,
                'advertiser'  => 'Jihad',
                'operator_id' => 23,
                'campaign_id' => 8,
                'client_id'   => $n,
                'product_id'  => 2,
                'user_id'     => 24,
                'quantity'    => null,
                'price'       => 140000,
                'total_price' => null,
                'status_id'   => 3,
                'created_at'  => date('Y-m-d', strtotime('- 1 month')),
                'updated_at'  => date('Y-m-d', strtotime('- 1 month')),
                ],
            ];
            $client = [
                [
                'admin_id'      => 2,
                'campaign_id'   => 8,
                'name'          => null,
                'whatsapp'      => null,
                'created_at'  => date('Y-m-d', strtotime('- 1 month')),
                'updated_at'  => date('Y-m-d', strtotime('- 1 month')),
                ],
            ];
            DB::table('leads')->insert($lead);
            DB::table('clients')->insert($client);
            $n+=1;
        }

        for($i=$n-227; $i<$n-227+184; $i++){
            DB::table('leads')->where('id', $i)->update([
                'quantity'    => 1,
                'total_price' => 1*140000,
                'status_id'   => 5,
                'updated_at' => date('Y-m-d', strtotime('- 1 month')),
            ]);
        }

        for($i=$n-227; $i<$n-227+76; $i++){
            DB::table('leads')->where('id', $i)->update([
                'quantity'    => 2,
                'total_price' => 2*140000,
                'updated_at' => date('Y-m-d', strtotime('- 1 month')),
            ]);
        }

        for ($i=1; $i<=174; $i++){
            $lead = [
                [
                'admin_id'    => 2,
                'advertiser'  => 'Isnan',
                'operator_id' => 24,
                'campaign_id' => 9,
                'client_id'   => $n,
                'product_id'  => 4,
                'user_id'     => 34,
                'quantity'    => null,
                'price'       => 75000,
                'total_price' => null,
                'status_id'   => 3,
                'created_at'  => date('Y-m-d', strtotime('- 1 month')),
                'updated_at'  => date('Y-m-d', strtotime('- 1 month')),
                ],
            ];
            $client = [
                [
                'admin_id'      => 2,
                'campaign_id'   => 9,
                'name'          => null,
                'whatsapp'      => null,
                'created_at'  => date('Y-m-d', strtotime('- 1 month')),
                'updated_at'  => date('Y-m-d', strtotime('- 1 month')),
                ],
            ];
            DB::table('leads')->insert($lead);
            DB::table('clients')->insert($client);
            $n+=1;
        }

        for($i=$n-174; $i<$n-174+128; $i++){
            DB::table('leads')->where('id', $i)->update([
                'quantity'    => 2,
                'total_price' => 2*75000,
                'status_id'   => 5,
                'updated_at' => date('Y-m-d', strtotime('- 1 month')),
            ]);
        }

        for($i=$n-174; $i<$n-174+36; $i++){
            DB::table('leads')->where('id', $i)->update([
                'quantity'    => 3,
                'total_price' => 3*75000,
                'updated_at' => date('Y-m-d', strtotime('- 1 month')),
            ]);
        }
    }
}
