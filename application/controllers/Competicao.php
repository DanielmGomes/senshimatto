<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Competicao extends CI_Controller {
    
        public function __construct(){
            parent::__construct();
            $this->load->library('session');

        }

        public function ajax_import_img()
        {
            if (!$this->input->is_ajax_request()) {
                exit('Nenhum acesso ao script permitido');
            }
    
            $config['upload_path'] = './tmp/';
            $config['allowed_types'] = 'gif|png|jpg';
            $config['overwrite'] = TRUE;
    
            $this->load->library('upload', $config);
    
            $json = array();
            $json['status'] = 1;
    
            if (!$this->upload->do_upload('image_file')) {
                $json['status'] = 0;
                $json['error'] = $this->upload->display_errors('','');
            }else {
                if ($this->upload->data()['file_size'] <= 1000000) {
                    $file_name = $this->upload->data()['file_name'];
                    $json['img_path'] = base_url() . 'tmp/' . $file_name;
                }else {
                    $json['status'] = 0;
                    $json['error'] = 'Imagem não pode ser maior que 5MB';
        
                }
            }
    
            echo json_encode($json);
    
        }

        public function ajax_save_competicao(){
            $json = array();
            $json['status'] = 1;
            $json['error_list'] = array();
    
            $this->load->model('administrativo_model');
            $data = $this->input->post();
    
            if (empty($data['nomeEvento'])) {
                $json['error_list']['#nomeEvento'] = 'Nome do Evento Obrigatorio';			
            }else {
                if ($this->administrativo_model->is_duplicated('nomeEvento', $data['nomeEvento'], $data['idCompeticao'])) {
                    $json['error_list']['#nomeEvento'] = 'Nome do Evento Já Existente';							
                }
            }
    
            if (!empty($data['cartaz'])) {
                $file_name = basename($data['cartaz']);
                $old_path = getcwd() . '/tmp/' . $file_name;
                $new_path = getcwd() . '/public/images/competicoes/' . $file_name;
                rename($old_path, $new_path);
    
                $data['cartaz'] = '/public/images/competicoes/' . $file_name;
            }
    
            if (empty($data['idCompeticao'])) {
                $this->administrativo_model->insert($data);
            }else{
                $idCompeticao = $data['idCompeticao'];
                $this->administrativo_model->update($data);
            }
            $this->load->view('admin/cadastros/competicoes');
        }

        public function cadastro_competicao(){
            if ($this->session->userdata('idUsuario')) {

            	/*
                 * carregar models
				*/
                $this->load->model('competicao_model');
                $this->load->model('usuario_model');
                $this->load->model('competicao_model');
				/*
				 * //carregar models
				 */

				$idUsuario = $this->session->userdata('idUsuario');
				$idCompeticao = 1;
				#$idCompeticao = $this->input->post('idCompeticao');

				$data = $this->usuario_model->get_data($idUsuario)->result_array()[0];
                $competicao = $this->competicao_model->get_data($idCompeticao)->result_array()[0];
				$lista = $this->competicao_model->lista_academia();

                /*
                *calcular idade do competidor
                */
                $dia = date('d');
                $mes = date('m');
                $ano = date('y');
                $ano_atual = 2000 + $ano;
                $nascimento = explode('-', $data['nascimento']);
                $ano_nascimento = $nascimento[0];
                $mes_nascimento = $nascimento[1];
                $dia_nascimento = $nascimento[2];
                $idade = $ano_atual - $ano_nascimento;
                /*
                * //calcular idade do competidor
                */

                /*
                 * verifica categoria do competidor
                 */

				if ($data['sexo'] == 'masculino'){
					#sexo masculino
					if ($idade <= 5){
						#pre-mirim
						if ($data['peso '] <= 17){
							$categoria_idade = 'pre-mirim';
							$categoria_peso = 'galo';
						}else{
							if ($data['peso'] > 17 and $data['peso'] <= 19){
								$categoria_idade ='pre-mirim';
								$categoria_peso = 'pluma';
							}else{
								if ($data['peso'] > 19 and $data['peso'] <= 22){
									$categoria_idade = 'pre-mirim';
									$categoria_peso = 'pena';
								}else{
									if ($data['peso'] > 22 and data['peso'] <= 25){
										$categoria_idade = 'pre-mirim';
										$categoria_peso = 'leve';
									}else{
										if ($data['peso'] > 25 and $data['peso'] <= 28.3){
											$categoria_idade = 'pre-mirim';
											$categoria_peso = 'medio';
										}else{
											if ($data['peso'] > 28.3 and $data['peso'] <= 31.3){
												$categoria_idade = 'pre-mirim';
												$categoria_peso = 'meio-pesado';
											}else{
												if (data['peso'] > 31.3 and $data['peso'] <= 34.5){
													$categoria_idade = 'pre-mirim';
													$categoria_peso = 'pesado';
												}else{
													if ($data['peso'] > 34.5 and $data['peso'] <= 37.5){
														$categoria_idade = 'pre-mirim';
														$categoria_peso = 'superpesado';
													}else{
														if ($data['peso'] < 37.5 and $data['peso'] <= 42.5){
															$categoria_idade = 'pre-mirim';
															$categoria_peso = 'pesadissimo';
														}else{
															if ($data['peso'] > 42.5){
																$categoria_idade = 'pre-mirim';
																$categoria_peso = 'extra pesadissimo';
															}
														}
													}
												}
											}
										}
									}
								}
							}
						}
					}else{
						if ($idade < 5 and $idade <= 7 ){
							#mirim
							if ($data['peso '] < 18){
								$categoria_idade = 'mirim';
								$categoria_peso = 'galo';
							}else{
								if ($data['peso'] > 18 and $data['peso'] <= 20){
									$categoria_idade ='mirim';
									$categoria_peso = 'pluma';
								}else{
									if ($data['peso'] > 20 and $data['peso'] <= 23){
										$categoria_idade = 'mirim';
										$categoria_peso = 'pena';
									}else{
										if ($data['peso'] > 23 and data['peso'] <= 26){
											$categoria_idade = 'mirim';
											$categoria_peso = 'leve';
										}else{
											if ($data['peso'] > 26 and $data['peso'] <= 29.3){
												$categoria_idade = 'mirim';
												$categoria_peso = 'medio';
											}else{
												if ($data['peso'] > 29.3 and $data['peso'] <= 32.3){
													$categoria_idade = 'mirim';
													$categoria_peso = 'meio-pesado';
												}else{
													if (data['peso'] > 32.3 and $data['peso'] <= 35.5){
														$categoria_idade = 'mirim';
														$categoria_peso = 'pesado';
													}else{
														if ($data['peso'] > 35.5 and $data['peso'] <= 38.5){
															$categoria_idade = 'mirim';
															$categoria_peso = 'superpesado';
														}else{
															if ($data['peso'] < 38.5 and $data['peso'] <= 44){
																$categoria_idade = 'mirim';
																$categoria_peso = 'pesadissimo';
															}else{
																if ($data['peso'] > 44){
																	$categoria_idade = 'mirim';
																	$categoria_peso = 'extra pesadissimo';
																}
															}
														}
													}
												}
											}
										}
									}
								}
							}
						}else{
							if ($idade < 7 and idade <= 9){
								#infantil A
								if ($data['peso '] < 23){
									$categoria_idade = 'infantil A';
									$categoria_peso = 'galo';
								}else{
									if ($data['peso'] > 23 and $data['peso'] <= 26){
										$categoria_idade = 'infantil A';
										$categoria_peso = 'pluma';
									}else{
										if ($data['peso'] > 26 and $data['peso'] <= 29.3){
											$categoria_idade = 'infantil A';
											$categoria_peso = 'pena';
										}else{
											if ($data['peso'] > 29.3 and data['peso'] <= 32.3){
												$categoria_idade = 'infantil A';
												$categoria_peso = 'leve';
											}else{
												if ($data['peso'] > 32.3 and $data['peso'] <= 35.5){
													$categoria_idade = 'infantil A';
													$categoria_peso = 'medio';
												}else{
													if ($data['peso'] > 35.5 and $data['peso'] <= 38.5){
														$categoria_idade = 'infantil A';
														$categoria_peso = 'meio-pesado';
													}else{
														if (data['peso'] > 38.5 and $data['peso'] <= 41.7){
															$categoria_idade = 'infantil A';
															$categoria_peso = 'pesado';
														}else{
															if ($data['peso'] > 41.7 and $data['peso'] <= 44.7){
																$categoria_idade = 'infantil A';
																$categoria_peso = 'superpesado';
															}else{
																if ($data['peso'] < 44.7 and $data['peso'] <= 50){
																	$categoria_idade = 'infantil A';
																	$categoria_peso = 'pesadissimo';
																}else{
																	if ($data['peso'] > 50){
																		$categoria_idade = 'infantil A';
																		$categoria_peso = 'extra pesadissimo';
																	}
																}
															}
														}
													}
												}
											}
										}
									}
								}
							}else{
								if ($idade > 9 and $idade <= 11){
									#infantil B
									if ($data['peso '] <= 29.3){
										$categoria_idade = 'infantil B';
										$categoria_peso = 'galo';
									}else{
										if ($data['peso'] > 29.3 and $data['peso'] <= 32.3){
											$categoria_idade = 'infantil B';
											$categoria_peso = 'pluma';
										}else{
											if ($data['peso'] > 32.3 and $data['peso'] <= 35.5){
												$categoria_idade = 'infantil B';
												$categoria_peso = 'pena';
											}else{
												if ($data['peso'] > 35.5 and data['peso'] <= 38.5){
													$categoria_idade = 'infantil B';
													$categoria_peso = 'leve';
												}else{
													if ($data['peso'] > 38.5 and $data['peso'] <= 41.7){
														$categoria_idade = 'infantil B';
														$categoria_peso = 'medio';
													}else{
														if ($data['peso'] > 41.7 and $data['peso'] <= 44.7){
															$categoria_idade = 'infantil B';
															$categoria_peso = 'meio-pesado';
														}else{
															if (data['peso'] > 44.7 and $data['peso'] <= 47.7){
																$categoria_idade = 'infantil B';
																$categoria_peso = 'pesado';
															}else{
																if ($data['peso'] > 47.7 and $data['peso'] <= 51){
																	$categoria_idade = 'infantil B';
																	$categoria_peso = 'superpesado';
																}else{
																	if ($data['peso'] < 51 and $data['peso'] <= 55){
																		$categoria_idade = 'infantil B';
																		$categoria_peso = 'pesadissimo';
																	}else{
																		if ($data['peso'] > 55){
																			$categoria_idade = 'infantil B';
																			$categoria_peso = 'extra pesadissimo';
																		}
																	}
																}
															}
														}
													}
												}
											}
										}
									}
								}else{
									if ($idade > 11 and $idade <= 13){
										#infanto juvenil A
										if ($data['peso '] < 34.5){
											$categoria_idade = 'infanto juvenil A';
											$categoria_peso = 'galo';
										}else{
											if ($data['peso'] > 34.5 and $data['peso'] <= 38.5){
												$categoria_idade = 'infanto juvenil A';
												$categoria_peso = 'pluma';
											}else{
												if ($data['peso'] > 38.5 and $data['peso'] <= 42.7){
													$categoria_idade = 'infanto juvenil A';
													$categoria_peso = 'pena';
												}else{
													if ($data['peso'] > 42.7 and data['peso'] <= 46.7){
														$categoria_idade = 'infanto juvenil A';
														$categoria_peso = 'leve';
													}else{
														if ($data['peso'] > 46.7 and $data['peso'] <= 51){
															$categoria_idade = 'infanto juvenil A';
															$categoria_peso = 'medio';
														}else{
															if ($data['peso'] > 51 and $data['peso'] <= 55.5){
																$categoria_idade = 'infanto juvenil A';
																$categoria_peso = 'meio-pesado';
															}else{
																if (data['peso'] > 55.5 and $data['peso'] <= 59.5){
																	$categoria_idade = 'infanto juvenil A';
																	$categoria_peso = 'pesado';
																}else{
																	if ($data['peso'] > 59.5 and $data['peso'] <= 63.5){
																		$categoria_idade = 'infanto juvenil A';
																		$categoria_peso = 'superpesado';
																	}else{
																		if ($data['peso'] < 63.5 and $data['peso'] <= 67.5){
																			$categoria_idade = 'infanto juvenil A';
																			$categoria_peso = 'pesadissimo';
																		}else{
																			if ($data['peso'] > 67.5){
																				$categoria_idade = 'infanto juvenil A';
																				$categoria_peso = 'extra pesadissimo';
																			}
																		}
																	}
																}
															}
														}
													}
												}
											}
										}
									}else{
										if ($idade > 13 and $idade <= 15){
											#infanto juvenil B
											if ($data['peso '] < 44){
												$categoria_idade = 'infanto juvenil B';
												$categoria_peso = 'galo';
											}else{
												if ($data['peso'] > 44 and $data['peso'] <= 48){
													$categoria_idade = 'infanto juvenil B';
													$categoria_peso = 'pluma';
												}else{
													if ($data['peso'] > 48 and $data['peso'] <= 52.5){
														$categoria_idade = 'infanto juvenil B';
														$categoria_peso = 'pena';
													}else{
														if ($data['peso'] > 52.5 and data['peso'] <= 56.5){
															$categoria_idade = 'infanto juvenil B';
															$categoria_peso = 'leve';
														}else{
															if ($data['peso'] > 56.5 and $data['peso'] <= 60.5){
																$categoria_idade = 'infanto juvenil B';
																$categoria_peso = 'medio';
															}else{
																if ($data['peso'] > 60.5 and $data['peso'] <= 64.5){
																	$categoria_idade = 'infanto juvenil B';
																	$categoria_peso = 'meio-pesado';
																}else{
																	if (data['peso'] > 64.5 and $data['peso'] <= 69){
																		$categoria_idade = 'infanto juvenil B';
																		$categoria_peso = 'pesado';
																	}else{
																		if ($data['peso'] > 69 and $data['peso'] <= 73){
																			$categoria_idade = 'infanto juvenil B';
																			$categoria_peso = 'superpesado';
																		}else{
																			if ($data['peso'] < 73 and $data['peso'] <= 77){
																				$categoria_idade = 'infanto juvenil B';
																				$categoria_peso = 'pesadissimo';
																			}else{
																				if ($data['peso'] > 77){
																					$categoria_idade = 'infanto juvenil B';
																					$categoria_peso = 'extra pesadissimo';
																				}
																			}
																		}
																	}
																}
															}
														}
													}
												}
											}
										}else{
											if ($idade > 15 and  $idade <= 17){
												#juvenil
												if ($data['peso '] < 53.5){
													$categoria_idade = 'juvenil';
													$categoria_peso = 'galo';
												}else{
													if ($data['peso'] > 53.5 and $data['peso'] <= 58.5){
														$categoria_idade = 'juvenil';
														$categoria_peso = 'pluma';
													}else{
														if ($data['peso'] > 58.5 and $data['peso'] <= 64){
															$categoria_idade = 'juvenil';
															$categoria_peso = 'pena';
														}else{
															if ($data['peso'] > 64 and data['peso'] <= 69){
																$categoria_idade = 'juvenil';
																$categoria_peso = 'leve';
															}else{
																if ($data['peso'] > 69 and $data['peso'] <= 74){
																	$categoria_idade = 'juvenil';
																	$categoria_peso = 'medio';
																}else{
																	if ($data['peso'] > 74 and $data['peso'] <= 79.3){
																		$categoria_idade = 'juvenil';
																		$categoria_peso = 'meio-pesado';
																	}else{
																		if (data['peso'] > 79.3 and $data['peso'] <= 84.3){
																			$categoria_idade = 'juvenil';
																			$categoria_peso = 'pesado';
																		}else{
																			if ($data['peso'] > 84.3 and $data['peso'] <= 89.3){
																				$categoria_idade = 'juvenil';
																				$categoria_peso = 'superpesado';
																			}else{
																				if ($data['peso'] > 89.3){
																					$categoria_idade = 'juvenil';
																					$categoria_peso = 'pesadissimo';
																				}
																			}
																		}
																	}
																}
															}
														}
													}
												}
											}else{
												if ($idade > 17 and $idade <= 29){
													#adulto
													if ($data['peso'] < 58){
														$categoria_idade = 'adulto';
														$categoria_peso = 'galo';
													}else{
														if ($data['peso'] > 58 and $data['peso'] <= 64){
															$categoria_idade = 'adulto';
															$categoria_peso = 'pluma';
														}else{
															if ($data['peso'] > 64 and $data['peso'] <= 70){
																$categoria_idade = 'adulto';
																$categoria_peso = 'pena';
															}else{
																if ($data['peso'] > 70 and $data['peso'] <= 76){
																	$categoria_idade = 'adulto';
																	$categoria_peso = 'leve';
																}else{
																	if ($data['peso'] > 76 and $data['peso'] <= 82.3){
																		$categoria_idade = 'adulto';
																		$categoria_peso = 'medio';
																	}else{
																		if ($data['peso'] > 82.3 and $data['peso'] <= 88.3){
																			$categoria_idade = 'adulto';
																			$categoria_peso = 'meio-pesado';
																		}else{
																			if ($data['peso'] > 88.3 and $data['peso'] <= 94.3){
																				$categoria_idade = 'adulto';
																				$categoria_peso = 'pesado';
																			}else{
																				if ($data['peso'] > 94.3 and $data['peso'] <= 100.5){
																					$categoria_idade = 'adulto';
																					$categoria_peso = 'superpesado';
																				}else{
																					if ($data['peso'] > 100.5){
																						$categoria_idade = 'adulto';
																						$categoria_peso = 'pesadissimo';
																					}
																				}
																			}
																		}
																	}
																}
															}
														}
													}
												}else{
													if ($idade > 29){
														#master
														if ($data['peso '] < 58){
															$categoria_idade = 'master';
															$categoria_peso = 'galo';
														}else{
															if ($data['peso'] > 58 and $data['peso'] <= 64){
																$categoria_idade = 'master';
																$categoria_peso = 'pluma';
															}else{
																if ($data['peso'] > 64 and $data['peso'] <= 70){
																	$categoria_idade = 'master';
																	$categoria_peso = 'pena';
																}else{
																	if ($data['peso'] > 70 and data['peso'] <= 76){
																		$categoria_idade = 'master';
																		$categoria_peso = 'leve';
																	}else{
																		if ($data['peso'] > 76 and $data['peso'] <= 82.3){
																			$categoria_idade = 'master';
																			$categoria_peso = 'medio';
																		}else{
																			if ($data['peso'] > 82.3 and $data['peso'] <= 88.3){
																				$categoria_idade = 'master';
																				$categoria_peso = 'meio-pesado';
																			}else{
																				if (data['peso'] > 88.3 and $data['peso'] <= 94.3){
																					$categoria_idade = 'master';
																					$categoria_peso = 'pesado';
																				}else{
																					if ($data['peso'] > 94.3 and $data['peso'] <= 100.5){
																						$categoria_idade = 'master';
																						$categoria_peso = 'superpesado';
																					}else{
																						if ($data['peso'] > 100.5){
																							$categoria_idade = 'master';
																							$categoria_peso = 'pesadissimo';
																						}
																					}
																				}
																			}
																		}
																	}
																}
															}
														}
													}
												}
											}
										}
									}
								}
							}
						}
					}
				}else{
					#sexo feminino
					if ($idade <= 5){
						#pre-mirim
						if ($data['peso '] <= 15){
							$categoria_idade = 'pre-mirim';
							$categoria_peso = 'galo';
						}else{
							if ($data['peso'] > 15 and $data['peso'] <= 17){
								$categoria_idade ='pre-mirim';
								$categoria_peso = 'pluma';
							}else{
								if ($data['peso'] > 17 and $data['peso'] <= 20){
									$categoria_idade = 'pre-mirim';
									$categoria_peso = 'pena';
								}else{
									if ($data['peso'] > 20 and data['peso'] <= 23){
										$categoria_idade = 'pre-mirim';
										$categoria_peso = 'leve';
									}else{
										if ($data['peso'] > 23 and $data['peso'] <= 26){
											$categoria_idade = 'pre-mirim';
											$categoria_peso = 'medio';
										}else{
											if ($data['peso'] > 26 and $data['peso'] <= 29.5){
												$categoria_idade = 'pre-mirim';
												$categoria_peso = 'meio-pesado';
											}else{
												if (data['peso'] > 29.5 and $data['peso'] <= 32.3){
													$categoria_idade = 'pre-mirim';
													$categoria_peso = 'pesado';
												}else{
													if ($data['peso'] > 32.3 and $data['peso'] <= 35.3){
														$categoria_idade = 'pre-mirim';
														$categoria_peso = 'superpesado';
													}else{
														if ($data['peso'] < 35.3 and $data['peso'] <= 38.5){
															$categoria_idade = 'pre-mirim';
															$categoria_peso = 'pesadissimo';
														}else{
															if ($data['peso'] > 38.5){
																$categoria_idade = 'pre-mirim';
																$categoria_peso = 'extra pesadissimo';
															}
														}
													}
												}
											}
										}
									}
								}
							}
						}
					}else{
						if (idade < 5 and $idade <= 7 ){
							#mirim
							if ($data['peso '] < 16){
								$categoria_idade = 'mirim';
								$categoria_peso = 'galo';
							}else{
								if ($data['peso'] > 16 and $data['peso'] <= 18){
									$categoria_idade ='mirim';
									$categoria_peso = 'pluma';
								}else{
									if ($data['peso'] > 18 and $data['peso'] <= 21){
										$categoria_idade = 'mirim';
										$categoria_peso = 'pena';
									}else{
										if ($data['peso'] > 21 and data['peso'] <= 24){
											$categoria_idade = 'mirim';
											$categoria_peso = 'leve';
										}else{
											if ($data['peso'] > 24 and $data['peso'] <= 27){
												$categoria_idade = 'mirim';
												$categoria_peso = 'medio';
											}else{
												if ($data['peso'] > 27 and $data['peso'] <= 30.5){
													$categoria_idade = 'mirim';
													$categoria_peso = 'meio-pesado';
												}else{
													if (data['peso'] > 30.5 and $data['peso'] <= 33.3){
														$categoria_idade = 'mirim';
														$categoria_peso = 'pesado';
													}else{
														if ($data['peso'] > 33.3 and $data['peso'] <= 36.3){
															$categoria_idade = 'mirim';
															$categoria_peso = 'superpesado';
														}else{
															if ($data['peso'] < 36.3 and $data['peso'] <= 40){
																$categoria_idade = 'mirim';
																$categoria_peso = 'pesadissimo';
															}else{
																if ($data['peso'] > 40){
																	$categoria_idade = 'mirim';
																	$categoria_peso = 'extra pesadissimo';
																}
															}
														}
													}
												}
											}
										}
									}
								}
							}
						}else{
							if ($idade < 7 and idade <= 9){
								#infantil A
								if ($data['peso '] < 18){
									$categoria_idade = 'infantil A';
									$categoria_peso = 'galo';
								}else{
									if ($data['peso'] > 18 and $data['peso'] <= 20){
										$categoria_idade = 'infantil A';
										$categoria_peso = 'pluma';
									}else{
										if ($data['peso'] > 20 and $data['peso'] <= 23){
											$categoria_idade = 'infantil A';
											$categoria_peso = 'pena';
										}else{
											if ($data['peso'] > 23 and data['peso'] <= 26){
												$categoria_idade = 'infantil A';
												$categoria_peso = 'leve';
											}else{
												if ($data['peso'] > 26 and $data['peso'] <= 29.3){
													$categoria_idade = 'infantil A';
													$categoria_peso = 'medio';
												}else{
													if ($data['peso'] > 29.3 and $data['peso'] <= 32.3){
														$categoria_idade = 'infantil A';
														$categoria_peso = 'meio-pesado';
													}else{
														if (data['peso'] > 32.3 and $data['peso'] <= 35.5){
															$categoria_idade = 'infantil A';
															$categoria_peso = 'pesado';
														}else{
															if ($data['peso'] > 35.5 and $data['peso'] <= 38.5){
																$categoria_idade = 'infantil A';
																$categoria_peso = 'superpesado';
															}else{
																if ($data['peso'] < 38.5 and $data['peso'] <= 42.5){
																	$categoria_idade = 'infantil A';
																	$categoria_peso = 'pesadissimo';
																}else{
																	if ($data['peso'] > 42.5){
																		$categoria_idade = 'infantil A';
																		$categoria_peso = 'extra pesadissimo';
																	}
																}
															}
														}
													}
												}
											}
										}
									}
								}
							}else{
								if ($idade > 9 and idade <= 11){
									#infantil B
									if ($data['peso '] <= 23){
										$categoria_idade = 'infantil B';
										$categoria_peso = 'galo';
									}else{
										if ($data['peso'] > 23 and $data['peso'] <= 26){
											$categoria_idade = 'infantil B';
											$categoria_peso = 'pluma';
										}else{
											if ($data['peso'] > 26 and $data['peso'] <= 29.3){
												$categoria_idade = 'infantil B';
												$categoria_peso = 'pena';
											}else{
												if ($data['peso'] > 29.33 and data['peso'] <= 32.3){
													$categoria_idade = 'infantil B';
													$categoria_peso = 'leve';
												}else{
													if ($data['peso'] > 32.3 and $data['peso'] <= 35.5){
														$categoria_idade = 'infantil B';
														$categoria_peso = 'medio';
													}else{
														if ($data['peso'] > 35.5 and $data['peso'] <= 38.5){
															$categoria_idade = 'infantil B';
															$categoria_peso = 'meio-pesado';
														}else{
															if (data['peso'] > 38.5 and $data['peso'] <= 41.7){
																$categoria_idade = 'infantil B';
																$categoria_peso = 'pesado';
															}else{
																if ($data['peso'] > 41.7 and $data['peso'] <= 44.7){
																	$categoria_idade = 'infantil B';
																	$categoria_peso = 'superpesado';
																}else{
																	if ($data['peso'] < 44.7 and $data['peso'] <= 48){
																		$categoria_idade = 'infantil B';
																		$categoria_peso = 'pesadissimo';
																	}else{
																		if ($data['peso'] > 48){
																			$categoria_idade = 'infantil B';
																			$categoria_peso = 'extra pesadissimo';
																		}
																	}
																}
															}
														}
													}
												}
											}
										}
									}
								}else{
									if ($idade > 11 and $idade <= 13){
										#infanto juvenil A
										if ($data['peso '] < 29.3){
											$categoria_idade = 'infanto juvenil A';
											$categoria_peso = 'galo';
										}else{
											if ($data['peso'] > 29.3 and $data['peso'] <= 32.3){
												$categoria_idade = 'infanto juvenil A';
												$categoria_peso = 'pluma';
											}else{
												if ($data['peso'] > 32.3 and $data['peso'] <= 35.5){
													$categoria_idade = 'infanto juvenil A';
													$categoria_peso = 'pena';
												}else{
													if ($data['peso'] > 35.5 and data['peso'] <= 38.5){
														$categoria_idade = 'infanto juvenil A';
														$categoria_peso = 'leve';
													}else{
														if ($data['peso'] > 38.5 and $data['peso'] <= 41.7){
															$categoria_idade = 'infanto juvenil A';
															$categoria_peso = 'medio';
														}else{
															if ($data['peso'] > 41.7 and $data['peso'] <= 44.7){
																$categoria_idade = 'infanto juvenil A';
																$categoria_peso = 'meio-pesado';
															}else{
																if (data['peso'] > 44.7 and $data['peso'] <= 47.7){
																	$categoria_idade = 'infanto juvenil A';
																	$categoria_peso = 'pesado';
																}else{
																	if ($data['peso'] > 47.7 and $data['peso'] <= 51){
																		$categoria_idade = 'infanto juvenil A';
																		$categoria_peso = 'superpesado';
																	}else{
																		if ($data['peso'] < 51 and $data['peso'] <= 55){
																			$categoria_idade = 'infanto juvenil A';
																			$categoria_peso = 'pesadissimo';
																		}else{
																			if ($data['peso'] > 55){
																				$categoria_idade = 'infanto juvenil A';
																				$categoria_peso = 'extra pesadissimo';
																			}
																		}
																	}
																}
															}
														}
													}
												}
											}
										}
									}else{
										if ($idade > 13 and $idade <= 15){
											#infanto juvenil B
											if ($data['peso '] < 35.5){
												$categoria_idade = 'infanto juvenil B';
												$categoria_peso = 'galo';
											}else{
												if ($data['peso'] > 35.5 and $data['peso'] <= 39.5){
													$categoria_idade = 'infanto juvenil B';
													$categoria_peso = 'pluma';
												}else{
													if ($data['peso'] > 39.5 and $data['peso'] <= 43.7){
														$categoria_idade = 'infanto juvenil B';
														$categoria_peso = 'pena';
													}else{
														if ($data['peso'] > 43.7 and data['peso'] <= 48){
															$categoria_idade = 'infanto juvenil B';
															$categoria_peso = 'leve';
														}else{
															if ($data['peso'] > 48 and $data['peso'] <= 52.5){
																$categoria_idade = 'infanto juvenil B';
																$categoria_peso = 'medio';
															}else{
																if ($data['peso'] > 52.5 and $data['peso'] <= 56.5){
																	$categoria_idade = 'infanto juvenil B';
																	$categoria_peso = 'meio-pesado';
																}else{
																	if (data['peso'] > 56.5 and $data['peso'] <= 60.5){
																		$categoria_idade = 'infanto juvenil B';
																		$categoria_peso = 'pesado';
																	}else{
																		if ($data['peso'] > 60.5 and $data['peso'] <= 65){
																			$categoria_idade = 'infanto juvenil B';
																			$categoria_peso = 'superpesado';
																		}else{
																			if ($data['peso'] < 65 and $data['peso'] <= 69){
																				$categoria_idade = 'infanto juvenil B';
																				$categoria_peso = 'pesadissimo';
																			}else{
																				if ($data['peso'] > 69){
																					$categoria_idade = 'infanto juvenil B';
																					$categoria_peso = 'extra pesadissimo';
																				}
																			}
																		}
																	}
																}
															}
														}
													}
												}
											}
										}else{
											if ($idade > 15 and  idade <= 17){
												#juvenil
												if ($data['peso '] < 43.7){
													$categoria_idade = 'juvenil';
													$categoria_peso = 'galo';
												}else{
													if ($data['peso'] > 43.7 and $data['peso'] <= 48){
														$categoria_idade = 'juvenil';
														$categoria_peso = 'pluma';
													}else{
														if ($data['peso'] > 48 and $data['peso'] <= 52.5){
															$categoria_idade = 'juvenil';
															$categoria_peso = 'pena';
														}else{
															if ($data['peso'] > 52.5 and data['peso'] <= 56.5){
																$categoria_idade = 'juvenil';
																$categoria_peso = 'leve';
															}else{
																if ($data['peso'] > 56.5 and $data['peso'] <= 60.5){
																	$categoria_idade = 'juvenil';
																	$categoria_peso = 'medio';
																}else{
																	if ($data['peso'] > 60.5 and $data['peso'] <= 65){
																		$categoria_idade = 'juvenil';
																		$categoria_peso = 'meio-pesado';
																	}else{
																		if (data['peso'] > 65 and $data['peso'] <= 69){
																			$categoria_idade = 'juvenil';
																			$categoria_peso = 'pesado';
																		}else{
																			if ($data['peso'] > 69 and $data['peso'] <= 73){
																				$categoria_idade = 'juvenil';
																				$categoria_peso = 'superpesado';
																			}else{
																				if ($data['peso'] > 73){
																					$categoria_idade = 'juvenil';
																					$categoria_peso = 'pesadissimo';
																				}
																			}
																		}
																	}
																}
															}
														}
													}
												}
											}else{
												if ($idade > 17 and $idade <= 29){
													#adulto
													if ($data['peso'] > 53.5){
														$categoria_idade = 'adulto';
														$categoria_peso = 'pluma';
													}else{
														if ($data['peso'] > 53.5 and $data['peso'] <= 58.5){
															$categoria_idade = 'adulto';
															$categoria_peso = 'pena';
														}else{
															if ($data['peso'] > 58.5 and data['peso'] <= 64){
																$categoria_idade = 'adulto';
																$categoria_peso = 'leve';
															}else{
																if ($data['peso'] > 64 and $data['peso'] <= 69){
																	$categoria_idade = 'adulto';
																	$categoria_peso = 'medio';
																}else{
																	if ($data['peso'] > 69 and $data['peso'] <= 74){
																		$categoria_idade = 'adulto';
																		$categoria_peso = 'meio-pesado';
																	}else{
																		if (data['peso'] > 74 and $data['peso'] <= 80){
																			$categoria_idade = 'adulto';
																			$categoria_peso = 'pesado';
																		}else{
																			if ($data['peso'] > 80 and $data['peso'] <= 85){
																				$categoria_idade = 'adulto';
																				$categoria_peso = 'superpesado';
																			}else{
																				if ($data['peso'] > 85){
																					$categoria_idade = 'adulto';
																					$categoria_peso = 'pesadissimo';
																				}
																			}
																		}
																	}
																}
															}
														}
													}
												}else{
													if ($idade > 29){
														#master
														if ($data['peso'] > 53.5){
															$categoria_idade = 'master';
															$categoria_peso = 'pluma';
														}else{
															if ($data['peso'] > 53.5 and $data['peso'] <= 58.5){
																$categoria_idade = 'master';
																$categoria_peso = 'pena';
															}else{
																if ($data['peso'] > 58.5 and data['peso'] <= 64){
																	$categoria_idade = 'master';
																	$categoria_peso = 'leve';
																}else{
																	if ($data['peso'] > 64 and $data['peso'] <= 69){
																		$categoria_idade = 'master';
																		$categoria_peso = 'medio';
																	}else{
																		if ($data['peso'] > 69 and $data['peso'] <= 74){
																			$categoria_idade = 'master';
																			$categoria_peso = 'meio-pesado';
																		}else{
																			if (data['peso'] > 74 and $data['peso'] <= 80){
																				$categoria_idade = 'master';
																				$categoria_peso = 'pesado';
																			}else{
																				if ($data['peso'] > 80 and $data['peso'] <= 85){
																					$categoria_idade = 'master';
																					$categoria_peso = 'superpesado';
																				}else{
																					if ($data['peso'] > 85){
																						$categoria_idade = 'master';
																						$categoria_peso = 'pesadissimo';
																					}
																				}
																			}
																		}
																	}
																}
															}
														}
													}
												}
											}
										}
									}
								}
							}
						}
					}
				}


				/*
				 *  logica calculo categoria CBJJ
				 *
				 */
				/*
                if ($data['sexo'] == 'masculino') {
                    if ($idade <= 10) {
                        if ($data['peso'] <= 22) {
                            $categoria_idade = 'mirm';
                            $categoria_peso = 'pluma';
                        }else {
                            if ($data['peso'] > 22 and $data['peso'] <= 26) {
								$categoria_idade = 'mirm';
								$categoria_peso = 'leve';
                            }else {
                                if ($data['peso'] > 26 and $data['peso'] <= 30) {
									$categoria_idade = 'mirm';
									$categoria_peso = 'meio pesado';
                                }else {
                                    if ($data['peso'] > 30 and $data['peso'] <= 34) {
										$categoria_idade = 'mirm';
										$categoria_peso = 'super pesado';
                                    }else {
                                        if ($data['peso'] > 36) {
											$categoria_idade = 'mirm';
											$categoria_peso = 'pesadissimo';
                                        }
                                    }
                                }
                            }
                        }
                    }else {
                        if ($idade > 10 and $idade <= 18 ) {
                            if ($data['peso'] <= 53.50) {
								$categoria_idade = 'juvenil';
								$categoria_peso = 'galo';
                            }else {
                                if ($data['peso'] > 53.50 and $data['peso'] <= 58.50) {
									$categoria_idade = 'juvenil';
									$categoria_peso = 'pluma';
                                }else {
                                    if ($data['peso'] > 58.50 and $data['peso'] <= 64) {
										$categoria_idade = 'juvenil';
										$categoria_peso = 'pena';
                                    }else {
                                        if ($data['peso'] > 64 and $data['peso'] <= 69) {
											$categoria_idade = 'juvenil';
											$categoria_peso = 'leve';
                                        }else {
                                            if ($data['peso'] > 69 and $data['peso'] <= 74) {
												$categoria_idade = 'juvenil';
												$categoria_peso = 'leve';
                                            }else {
                                                if ($data['peso'] > 74 and $data['peso'] <= 79.30) {
													$categoria_idade = 'juvenil';
													$categoria_peso = 'meio pesado';
                                                }else {
                                                    if ($data['peso'] > 79.30 and $data['peso'] <= 84.30) {
														$categoria_idade = 'juvenil';
														$categoria_peso = 'pesado';
                                                    }else {
                                                        if ($data['peso'] > 84.30 and $data['peso'] <= 89.30) {
															$categoria_idade = 'juvenil';
															$categoria_peso = 'super pesado';
                                                        }else {
                                                            if ($data['peso'] > 89.30) {
																$categoria_idade = 'juvenil';
																$categoria_peso = 'pesadissimo';
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }else {
                            if ($idade > 18 and $idade <= 30) {
                                if ($data['peso'] <= 57.50) {
									$categoria_idade = 'adulto';
									$categoria_peso = 'galo';
                                }else {
                                    if ($data['peso'] > 57.50 and $data['peso'] <= 64) {
										$categoria_idade = 'adulto';
										$categoria_peso = 'pluma';
                                    }else {
                                        if ($data['peso'] > 64 and $data['peso'] <= 70) {
											$categoria_idade = 'adulto';
											$categoria_peso = 'pena';
                                        }else {
                                            if ($data['peso'] > 70 and $data['peso'] <= 76) {
												$categoria_idade = 'adulto';
												$categoria_peso = 'leve';
                                            }else {
                                                if ($data['peso'] > 76 and $data['peso'] <= 82.30) {
													$categoria_idade = 'adulto';
													$categoria_peso = 'medio';
                                                }else {
                                                    if ($data['peso'] > 82.30 and $data['peso'] <= 88.30) {
														$categoria_idade = 'adulto';
														$categoria_peso = 'meio pesado';
                                                    }else {
                                                        if ($data['peso'] > 88.30 and $data['peso'] <= 94.30) {
															$categoria_idade = 'adulto';
															$categoria_peso = 'pesado';
                                                        }else {
                                                            if ($data['peso'] > 94.30 and $data['peso'] <= 100.50) {
																$categoria_idade = 'adulto';
																$categoria_peso = 'super pesado';
                                                            }else {
                                                                if ($data['peso'] > 100.50) {
																	$categoria_idade = 'adulto';
																	$categoria_peso = 'pesadissimo';
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }else {
                                if ($idade > 30) {
                                    echo 'masculino senior';
                                    if ($data['peso'] <= 57.50) {
										$categoria_idade = 'senior';
										$categoria_peso = 'galo';
                                    }else {
                                        if ($data['peso'] > 57.50 and $data['peso'] <= 64) {
											$categoria_idade = 'senior';
											$categoria_peso = 'pluma';
                                        }else {
                                            if ($data['peso'] > 64 and $data['peso'] <= 70) {
												$categoria_idade = 'senior';
												$categoria_peso = 'pena';
                                            }else {
                                                if ($data['peso'] > 70 and $data['peso'] <= 76) {
													$categoria_idade = 'senior';
													$categoria_peso = 'leve';
                                                }else {
                                                    if ($data['peso'] > 76 and $data['peso'] <= 82.30) {
														$categoria_idade = 'senior';
														$categoria_peso = 'medio';
                                                    }else {
                                                        if ($data['peso'] > 82.30 and $data['peso'] <= 88.30) {
															$categoria_idade = 'senior';
															$categoria_peso = 'meio pesado';
                                                        }else {
                                                            if ($data['peso'] > 88.30 and $data['peso'] <= 94.30) {
																$categoria_idade = 'senior';
																$categoria_peso = 'pesado';
                                                            }else {
                                                                if ($data['peso'] > 94.30 and $data['peso'] <= 100.50) {
																	$categoria_idade = 'senior';
																	$categoria_peso = 'super pesado';
                                                                }else {
                                                                    if ($data['peso'] > 100.50) {
																		$categoria_idade = 'senior';
																		$categoria_peso = 'pesadissimo';
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }else {
                    echo 'sexo feminino';
                    if ($idade <= 10) {
                        if ($data['peso'] <= 20) {
							$categoria_idade = 'mirim';
							$categoria_peso = 'pluma';
                        }else {
                            if ($data['peso'] > 20 and $data['peso'] <= 24) {
								$categoria_idade = 'mirim';
								$categoria_peso = 'leve';
                            }else {
                                if ($data['peso'] > 24 and $data['peso'] <= 28) {
									$categoria_idade = 'mirim';
									$categoria_peso = 'meio pesado';
                                }else {
                                    if ($data['peso'] > 28 and $data['peso'] <= 32) {
										$categoria_idade = 'mirim';
										$categoria_peso = 'super pesado';
                                    }else {
                                        if ($data['peso'] > 36) {
											$categoria_idade = 'mirim';
											$categoria_peso = 'pesadissimo';
                                        }
                                    }
                                }
                            }
                        }
                    }else {
                        if ($idade > 10 and $idade <= 18 ) {
                            if ($data['peso'] <= 44.30) {
								$categoria_idade = 'juvenil';
								$categoria_peso = 'galo';
                            }else {
                                if ($data['peso'] > 44.30 and $data['peso'] <= 48.30) {
									$categoria_idade = 'juvenil';
									$categoria_peso = 'pluma';
                                }else {
                                    if ($data['peso'] > 48.30 and $data['peso'] <= 52.50) {
                                        echo 'pena';
										$categoria_idade = 'juvenil';
										$categoria_peso = 'pena';
                                    }else {
                                        if ($data['peso'] > 52.50 and $data['peso'] <= 56.50) {
											$categoria_idade = 'juvenil';
											$categoria_peso = 'leve';
                                        }else {
                                            if ($data['peso'] > 56.50 and $data['peso'] <= 60.50) {
												$categoria_idade = 'juvenil';
												$categoria_peso = 'medio';
                                            }else {
                                                if ($data['peso'] > 60.50 and $data['peso'] <= 65) {
													$categoria_idade = 'juvenil';
													$categoria_peso = 'meio pesado';
                                                }else {
                                                    if ($data['peso'] > 65 and $data['peso'] <= 69) {
														$categoria_idade = 'juvenil';
														$categoria_peso = 'pesado';
                                                    }else {
                                                        if ($data['peso'] > 69 and $data['peso'] <= 73) {
															$categoria_idade = 'juvenil';
															$categoria_peso = 'super pesado';
                                                        }else {
                                                            if ($data['peso'] > 73) {
																$categoria_idade = 'juvenil';
																$categoria_peso = 'pesadissimo';
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }else {
                            if ($idade > 18 and $idade <= 30) {
                                if ($data['peso'] <= 48.50) {
									$categoria_idade = 'adulto';
									$categoria_peso = 'galo';
                                }else {
                                    if ($data['peso'] > 48.50 and $data['peso'] <= 53.50) {
										$categoria_idade = 'adulto';
										$categoria_peso = 'pluma';
                                    }else {
                                        if ($data['peso'] > 53.50 and $data['peso'] <= 58.50) {
											$categoria_idade = 'adulto';
											$categoria_peso = 'pena';
                                        }else {
                                            if ($data['peso'] > 58.50 and $data['peso'] <= 64) {
												$categoria_idade = 'adulto';
												$categoria_peso = 'leve';
                                            }else {
                                                if ($data['peso'] > 64 and $data['peso'] <= 69) {
													$categoria_idade = 'adulto';
													$categoria_peso = 'medio';
                                                }else {
                                                    if ($data['peso'] > 69 and $data['peso'] <= 74) {
														$categoria_idade = 'adulto';
														$categoria_peso = 'meio pesado';
                                                    }else {
                                                        if ($data['peso'] > 74 and $data['peso'] <= 79.30) {
															$categoria_idade = 'adulto';
															$categoria_peso = 'pesado';
                                                        }else {
                                                            if ($data['peso'] > 79.30 and $data['peso'] <= 84.30) {
																$categoria_idade = 'adulto';
																$categoria_peso = 'super pesado';
                                                            }else {
                                                                if ($data['peso'] > 84.30) {
																	$categoria_idade = 'adulto';
																	$categoria_peso = 'pesadissimo';
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }else {
                                if ($idade > 30) {
                                    if ($data['peso'] <= 48.50) {
										$categoria_idade = 'senior';
										$categoria_peso = 'galo';
                                    }else {
                                        if ($data['peso'] > 48.50 and $data['peso'] <= 53.50) {
											$categoria_idade = 'senior';
											$categoria_peso = 'pluma';
                                        }else {
                                            if ($data['peso'] > 53.50 and $data['peso'] <= 58.50) {
												$categoria_idade = 'senior';
												$categoria_peso = 'pena';
                                            }else {
                                                if ($data['peso'] > 58.50 and $data['peso'] <= 64) {
													$categoria_idade = 'senior';
													$categoria_peso = 'leve';
                                                }else {
                                                    if ($data['peso'] > 64 and $data['peso'] <= 69) {
														$categoria_idade = 'senior';
														$categoria_peso = 'medio';
                                                    }else {
                                                        if ($data['peso'] > 69 and $data['peso'] <= 74) {
															$categoria_idade = 'senior';
															$categoria_peso = 'meio pesado';
                                                        }else {
                                                            if ($data['peso'] > 74 and $data['peso'] <= 79.30) {
                                                                echo 'pesado';
																$categoria_idade = 'senior';
																$categoria_peso = 'pesado';
                                                            }else {
                                                                if ($data['peso'] > 79.30 and $data['peso'] <= 84.30) {
                                                                    echo 'super pesado';
																	$categoria_idade = 'senior';
																	$categoria_peso = 'super pesado';
                                                                }else {
                                                                    if ($data['peso'] > 84.30) {
																		$categoria_idade = 'senior';
																		$categoria_peso = 'pesadissimo';
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                */
				/*
				 * //logica calculo categoria CBJJ
				 */
				/*
                 * //verifica categoria do competidor
                 */

                /*
                 * carregar dados para view
                 */
                $dados = array(
                	/*
                	 * dados do usuario
                	 */
                    'idUsuario' => $data['idUsuario'],
                    'nome' => $data['nome'],
                    'nascimento' => $data['nascimento'],
                    'cpf' => $data['cpf'],
                    'sexo' => $data['sexo'],
                    'whatsapp' => $data['whatsapp'],
                    'email' => $data['email'],
                    'academia' => $data['academia'],
                    'professor' => $data['professor'],
                    'faixa' => $data['faixa'],
                    'peso' => $data['peso'],
                    'endereco' => $data['endereco'],
                    'bairro' => $data['bairro'],
                    'estado' => $data['estado'],
                    'cidade' => $data['cidade'],
                    'categoria_idade' => $categoria_idade,
                    'categoria_peso' => $categoria_peso,
                    'idade' => $idade,
                    'lista_academia' => $lista,
                    /*
                     * //dados do usuario
                     */
                    /*
                     * dados da competição
                     */
                    'idCompeticao' => $competicao['idCompeticao'],
                    'nomeCompeticao' => $competicao['nomeEvento'],
                    'enderecoCompeticao' => $competicao['endereco'],
                    'estadoCompeticao' => $competicao['estado'],
                    'cidadeCompeticao' => $competicao['cidade'],
                    'dataCompeticao' => $competicao['data'],
                    'descricaoCompeticao' => $competicao['descricao'],
                    'cartazCompeticao' => $competicao['cartaz'],
					/*
					 * //dados da competição
					*/
                );

                $this->load->view('usuarios/template/header');
                $this->load->view('usuarios/cadastros/competicao', $dados);
                $this->load->view('template/footer');
                $this->load->view('template/scripts');  
                /*
                 * //carregar dados para view
                 */


            }else {
                $this->load->view('template/header');
                $this->load->view('login');
                $this->load->view('template/footer');
                $this->load->view('template/scripts');                
            }
        }

		public function edita_inscricao(){
			$idUsuario = $this->session->userdata('idUsuario');
			$data = array(
				'nome' => $this->input->post('nome'),
				'nascimento' => $this->input->post('nascimento'),
				'cpf' => $this->input->post('cpf'),
				'sexo' => $this->input->post('sexo'),
				'academia' => $this->input->post('academia'),
				'professor' => $this->input->post('professor'),
				'faixa' => $this->input->post('faixa'),
				'peso' => $this->input->post('peso'),
			);

			$this->load->model('usuario_model');
			$this->usuario_model->update($idUsuario, $data);
			$this->cadastro_competicao();
		}

        public function cidades(){
            $this->load->view('cidades');
        }

    }
?>
