<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Organization;
use Illuminate\Database\Seeder;

class BranchsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Branch::truncate();
        //BRANCHES FOR UNIVERSITY OF DAR ES SALAAM
        $udsmOrganization = Organization::find(1);
        $mlimaniBranch = new Branch();
        $mlimaniBranch->branch_id = 1;
        $mlimaniBranch->branch_name = 'MLIMANI CAMPUS';
        $mlimaniBranch->branch_phone_number = '0789678967';
        $mlimaniBranch->branch_email = "mlimani@udsm.com";
        $mlimaniBranch->branch_address = '34567';
        $udsmOrganization->branches()->save($mlimaniBranch);

        $coictBranch = new Branch();
        $coictBranch->branch_id = 2;
        $coictBranch->branch_name = 'COICT';
        $coictBranch->branch_phone_number = '0676563536';
        $coictBranch->branch_email = "coict@udsm.com";
        $coictBranch->branch_address = '23456';
        $udsmOrganization->branches()->save($coictBranch);

        $duceBranch = new Branch();
        $duceBranch->branch_id = 3;
        $duceBranch->branch_name = 'DUCE';
        $duceBranch->branch_phone_number = '0676563536';
        $duceBranch->branch_email = "duce@udsm.com";
        $duceBranch->branch_address = '456789';
        $udsmOrganization->branches()->save($duceBranch);

        $sjmcBranch = new Branch();
        $sjmcBranch->branch_id = 4;
        $sjmcBranch->branch_name = 'SJMC';
        $sjmcBranch->branch_phone_number = '0676563536';
        $sjmcBranch->branch_email = "sjmc@udsm.com";
        $sjmcBranch->branch_address = '436782';
        $udsmOrganization->branches()->save($sjmcBranch);

        //BRANCHES FOR UNIVERSITY OF DODOMA
        $udomOrganization = Organization::find(2);
        $mdBranch = new Branch();
        $mdBranch->branch_id = 5;
        $mdBranch->branch_name = 'SCHOOL OF MEDICINE';
        $mdBranch->branch_phone_number = '0723478967';
        $mdBranch->branch_email = "medicalschool@udom.com";
        $mdBranch->branch_address = '8547542';
        $udomOrganization->branches()->save($mdBranch);

        $civeBranch = new Branch();
        $civeBranch->branch_id = 6;
        $civeBranch->branch_name = 'CIVE';
        $civeBranch->branch_phone_number = '0723478967';
        $civeBranch->branch_email = "cive@udom.com";
        $civeBranch->branch_address = '23452';
        $udomOrganization->branches()->save($civeBranch);

        $soedBranch = new Branch();
        $soedBranch->branch_id = 7;
        $soedBranch->branch_name = 'SCHOOL OF EDUCATION';
        $soedBranch->branch_phone_number = '0723478967';
        $soedBranch->branch_email = "soed@udom.com";
        $soedBranch->branch_address = '12344';
        $udomOrganization->branches()->save($soedBranch);

        //BRANCHES FOR ARDHI UNIVERSITY
        $ardhiOrganization = Organization::find(3);
        $envsBranch = new Branch();
        $envsBranch->branch_id = 8;
        $envsBranch->branch_name = 'COLLEGE OF ENVIRONMENTAL SCIENCE';
        $envsBranch->branch_phone_number = '0678686868';
        $envsBranch->branch_email = "envs@ardhi.com";
        $envsBranch->branch_address = '8547542';
        $ardhiOrganization->branches()->save($envsBranch);

        $structuralBranch = new Branch();
        $structuralBranch->branch_id = 9;
        $structuralBranch->branch_name = 'STRUCTURAL ENGINEERING';
        $structuralBranch->branch_phone_number = '0678686868';
        $structuralBranch->branch_email = "stre@ardhi.com";
        $structuralBranch->branch_address = '8547542';
        $ardhiOrganization->branches()->save($structuralBranch);


        //BRANCHES FOR MKWAWA UNIVERSITY
        $mkwawaOrganization = Organization::find(4);
        $coedBranch = new Branch();
        $coedBranch->branch_id = 10;
        $coedBranch->branch_name = 'COLLEDGE OF EDUCATION';
        $coedBranch->branch_phone_number = '0656353536';
        $coedBranch->branch_email = "coed@mkwawa.com";
        $coedBranch->branch_address = '8547542';
        $mkwawaOrganization->branches()->save($coedBranch);

        $coeBranch = new Branch();
        $coeBranch->branch_id = 11;
        $coeBranch->branch_name = 'COLLEDGE OF ENGINEERING';
        $coeBranch->branch_phone_number = '0656353536';
        $coeBranch->branch_email = "coe@mkwawa.com";
        $coeBranch->branch_address = '8547542';
        $mkwawaOrganization->branches()->save($coeBranch);

         //BRANCHES FOR EGA
         $egaOrganization = Organization::find(5);
         $hqBranch = new Branch();
         $hqBranch->branch_id = 12;
         $hqBranch->branch_name = 'HEAD QUATER DAR ES SALAAM';
         $hqBranch->branch_phone_number = '0656353536';
         $hqBranch->branch_email = "hq@ega.com";
         $hqBranch->branch_address = '8547542';
         $egaOrganization->branches()->save($hqBranch);
 
         $centarlBranch = new Branch();
         $centarlBranch->branch_id = 13;
         $centarlBranch->branch_name = 'CENTRAL ZONE OFFICE';
         $centarlBranch->branch_phone_number = '0767898976';
         $centarlBranch->branch_email = "central@ega.com";
         $centarlBranch->branch_address = '6789';
         $egaOrganization->branches()->save($centarlBranch);

         $lakezoneBranch = new Branch();
         $lakezoneBranch->branch_id = 14;
         $lakezoneBranch->branch_name = 'LAKE ZONE OFFICE';
         $lakezoneBranch->branch_phone_number = '0678789098';
         $lakezoneBranch->branch_email = "lakezone@ega.com";
         $lakezoneBranch->branch_address = '43567';
         $egaOrganization->branches()->save($lakezoneBranch);
    }
}
