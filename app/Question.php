<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Question extends Model
{
    protected $guarded=['id'];
    public function topic(){
        $this->belongsTo(Topic::class);
    }


    public function addQuestion($array){
    	$array=$this->order_array($array);
    	//seriada
    	if(sizeof($array)>1){
    		$controlquestion=new Question($this->getQuestionArray($array[0]));
    		unset($array[0]);
    		$collectionquestionstoadd=collect([$controlquestion]);
    		foreach($array as $element){
    			$questionarray=$this->getQuestionArray($element);
    			$question=new Question($questionarray);
    			$collectionquestionstoadd->push($question);
    		}
    		
    		$controlquestion=$collectionquestionstoadd->shift();
    		$controlquestion->save();
    		foreach($collectionquestionstoadd as $questiontoadd){
    			$questiontoadd->extra="parent::".$controlquestion->id;
    			$questiontoadd->save();
    			$controlquestion->options=$controlquestion->options.$questiontoadd->id.";&";
    		}
    		$controlquestion->options=substr($controlquestion->options, 0,-2);
    		$controlquestion->save();
    		return $controlquestion;
    	}
    	//no seriada
    	else{
    		$questionarray=$this->getQuestionArray($array[0]);
    		$question=new Question($questionarray);
    		$question->save();
    		return $question;
    	}

    }
		private function getQuestionArray($array){
			$keys=array_keys($array);
			$questionarray=array();
			$options="";
			$physical_examination;
			$name;
			$topic_id;
			$extra;
			$type_of_question_id;
			$labs="";
			$vital_signs="";

			foreach($keys as $key){
				//name
				if(strpos($key, "name")!==false){
					$name=$array[$key];
				}
				//options
				if(strpos($key,"option")!==false){
					$formnumber=explode("_", $key)[1];
					$optionnumber= explode("_",$key)[2];
					$explanationkey="explanation_".$formnumber."_".$optionnumber;
					$explanationstring=$array[$explanationkey];
					$options=$options.$array[$key]."::".$explanationstring.";&";
				}
				//svs
					if(strpos($key, "fc")!==false && $array[$key]!=null){
						$vital_signs=$vital_signs."fc::".$array[$key].";&";
					}
					if(strpos($key, "fr")!==false && $array[$key]!=null){
						$vital_signs=$vital_signs."fr::".$array[$key].";&";
					}
					if(strpos($key, "temp")!==false && $array[$key]!=null){
						$vital_signs=$vital_signs."temp::".$array[$key].";&";
					}
					if(strpos($key, "tas")!==false && strpos($key, "tas")==0 && $array[$key]!=null){
						$vital_signs=$vital_signs."tas::".$array[$key].";&";
					}
					if(strpos($key, "tad")!==false && strpos($key, "tad")==0 && $array[$key]!=null){
						$vital_signs=$vital_signs."tad::".$array[$key].";&";
					}
				
				//topic_id
				if(strpos($key, "topicid")!==false){
					$topic_id=$array[$key];
				}
				//typeofquestion
				if(strpos($key, "typeofquestionid")!==false){
					$type_of_question_id=$array[$key];
				}
				//physical ex
				if(strpos($key,"physicalexamination")!==false){
					$physical_examination=$array[$key];
				}
				//labs
				if(strpos($key, "lab")!==false){
					if(strpos($key, "param")){
						$labs=$labs.$array[$key]."::";
					}else{
						$labs=$labs.$array[$key].";&";
					}
				}
				//extra
				if(strpos($key,"extra")!==false){
					$extra=$array[$key];
				}

			}
			//get out last 2 symbols
			$labs=(substr($labs, 0, -2))?substr($labs, 0, -2):null;
			$options=(substr($options, 0, -2))?substr($options, 0, -2):null;
			$vital_signs=(substr($vital_signs, 0, -2))?substr($vital_signs, 0, -2):null;
			$added_at_version= $updated_at_version=DBinfo::getVersion();

			return compact(["name",
				"options",
				"added_at_version",
				"updated_at_version",
				"to_update",
				"physical_examination",
				"extra",
				"topic_id",
				"type_of_question_id",
				"labs",
				"vital_signs"
		]);
		}

        private function order_array($array){
        unset($array["_token"]);
        $arraykeys=array_keys($array);
        $formnumbers=array();
        $ordered_array_keys=array();
        foreach($arraykeys as $key){
            if(strpos($key, "name")!==false){
               $formnumbers[]=explode("_",$key)[1];
            }
        }
        //agregar las keys en orden
        foreach ($formnumbers as $number) {
            $arrayquestionkeys=array();
            //crear un array para guardar las keys de cada pregunta
            foreach($arraykeys as $key){
                //añadira al array de la pregunta solo si el elemento es de esa pregunta
                $keynumber=explode("_", $key);
                if(sizeof($keynumber)>=2){
                    $keynumber=$keynumber[1];
                    if($keynumber==$number){
                    $arrayquestionkeys[$key]=$array[$key];
                    }
                }

            }
            $ordered_array_keys[]=$arrayquestionkeys;
        }
        //
        return ($ordered_array_keys);

    }
}

