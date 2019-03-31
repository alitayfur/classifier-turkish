<?php

	class classifier {
		public $data = array();
		
		public function classify($string,$thing= 'turkish')
				{
			    $this->data['scala']  = [];
				$this->data['string'] = $string;			
				$this->sentence();
			foreach ($this->data['sentence'] as $sentence):
				$last['word']         = end($sentence);
				$last['add5']         = mb_substr($last['word'],-5,4);
				$last['add2']         = mb_substr($last['word'],-2,2);
				$last['add1']         = mb_substr($last['word'],-1,1);
 
				$this->data['scala'][]   = $this->opinion($last,$sentence,$thing);
			
		    endforeach;
		
		    return $this->data['score'] = round(((100/(count($this->data['scala'])*100))*array_sum($this->data['scala'])));
		    

				}



		public function smile() {       
			$smile= ceil($this->data['score']/20);
	        return $smile<1?1:$smile;
		}
		
		
		public function sentence() {
			$this->data['sentence'] =[];
			$sentences = explode('.',$this->data['string']);
			foreach ($sentences as $sentence):
				$words = explode(',',$sentence);
				foreach ($words as $word) {
					$word = trim($word);
					if ($word=='') continue;
					$this->data['sentence'][] = explode(' ',$word);
										  }			
			endforeach;


		}
		



	    private function opinion($last, $sentence, $thing) {
	    	$return=100;
	    	$letters['turkish'] = array(
							'add1' => array('k','u','ı','ü'),
							'add2' => array('uk','ok','ak','tu','tı','tü'),
							'add5' => array('madı','medi')
							);
	    	$beds['turkish']  = array('medi','madı','mamı','mami','hiç ','hic ',"mez",'maz','kötü','siz','vasat','sız','yok','berbat','eski','kirli','mıyor','miyor','mama','yazık','tiksi','pisli','fırça','fırca','neden',' ne ','niye','mem','mam');
	    	$goods['turkish'] = array('kemmel','mutlu','var','beğendim','begendim','ekkür','tebr');
	    	foreach ($letters[$thing] as $key => $value) {
	    				if (in_array($last[$key], $value)) $return-=40;
	    		}

	    	$text = $sentence;
	    	unset($text[count($text)-1]);
	    	$text = implode(' ',$text);

	    	foreach ($beds[$thing] as $bed) {
	    		$return-=(80*$this->str_pos($text,$bed));
	    	}

	    	foreach ($goods[$thing] as $good) {
	    		$return+=(80*$this->str_pos($text,$good));
	    	}

	    	return $return;

	    }

		private function str_pos($haystack ,$needle ,$offset=0,$location=0) {
				$location = strpos($haystack ,$needle ,$location);
				if ($location !== false) {
					$offset++;
					$location++;
					$this->str_pos($haystack ,$needle ,$offset,$location);
				}
				return $offset;

			}

		}

