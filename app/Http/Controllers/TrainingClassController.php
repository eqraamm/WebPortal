<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrainingClassController extends Controller
{
    public function showTrainingClass(){
        checkPrivileges('ALLOWTRAININGMENU');
        session(['sidebar' => 'training_class']);

        return view('Training.TrainingClass');
    }

    public function showModalParticipantClass(Request $request){

        $data = array(
            'trainingid' => $request->trainingid,
            'date' => $request->date,
            'startime' => $request->starttime,
            'endtime' => $request->endtime,
            'status' => $request->status,
            'location' => $request->location,
            'subjects' => $request->subjects,
            'agentlevel1f' => $request->agentlvl1f,
            'agentlevel2f' => $request->agentlvl2f,
            'agentlevel3f' => $request->agentlvl3f,
            'agentlevel4f' => $request->agentlvl4f,
            'trainer' => $request->trainer,
            'participation' => $request->participation,
            'ujianf' => $request->ujianf,
            'description' => $request->description,
        );

        return view('Training.modalParticipationClass', array('data' => $data));
    }

    public function showOpenClass(Request $request){
        $data = array(
            'trainingid' => $request->trainingid,
            'date' => $request->date,
            'startime' => $request->starttime,
            'endtime' => $request->endtime,
            'location' => $request->location,
            'subjects' => $request->subjects,
            'agentlevel1f' => $request->agentlvl1f,
            'agentlevel2f' => $request->agentlvl2f,
            'agentlevel3f' => $request->agentlvl3f,
            'agentlevel4f' => $request->agentlvl4f,
            'trainer' => $request->trainer,
        );
        return view('Training.modalOpenClass', array('data' => $data));
    }

    public function showAddParticipateClass(){
        return view('Training.modalAddParticipate');
    }
}
