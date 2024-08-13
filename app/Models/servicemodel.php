<?php

namespace App\Models;

use CodeIgniter\Model;

class servicemodel extends Model

{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['foto'];
    

	public function tampil($tabel){
     return $this->db->table($tabel)  
     				 ->get()
          			 ->getResult();   

	}
    public function tampil_urut($tabel){
        return $this->db->table($tabel)
            ->orderBy('id_donasi', 'DESC')
            ->get()
            ->getResult();   
    }
    public function join($tabel1, $tabel2, $on){
     return $this->db->table($tabel1)  
                     ->join($tabel2,$on,'left')
                     ->get()
                     ->getResult();   

    }
     public function join1($tabel1, $tabel2, $on){
     return $this->db->table($tabel1)  
                     ->join($tabel2,$on,'inner')
                     ->get()
                     ->getResult();   

    }
    public function joinWhere($tabel1, $tabel2, $on, $where){
     return $this->db->table($tabel1, $where)  
                     ->join($tabel2,$on,'left')
                     ->get()
                     ->getRow();   

    }
    public function joinWherer($tabel1, $tabel2, $on, $where){
     return $this->db->table($tabel1)  
                     ->join($tabel2,$on,'left')
                     ->getWhere($where)
                     ->getRow();   

    }
	public function tambah($table,$isi){
		return $this->db->table($table)
						->insert($isi);
	}
    public function upload($file){
		 $imageName = $file->getName();
         $file->move(ROOTPATH . 'public/img', $imageName);
	}
	public function hapus($table,$where){
        return $this->db->table($table)
                        ->delete($where);
    }
    public function edit($tabel,$isi,$where){
        return $this->db->table($tabel)
                        ->update($isi,$where);
    }
    public function updatee($tabel,$isi){
        return $this->db->table($tabel)
                        ->update($isi);
    }
    public function getWhere($tabel,$where){
        return $this->db->table($tabel)
                        ->getwhere($where)
                        ->getRow();
    }

    public function joinWhererr($tabel1, $tabel2, $on, $where){
        return $this->db->table($tabel1)  
                        ->join($tabel2, $on,'inner')
                        ->getWhere($where)
                        ->getResult();   
   
       } 

        public function join3($tabel1, $tabel2, $tabel3, $on, $on2,$where){
            return $this->db->table($tabel1)  
                            ->join($tabel2, $on,'inner')
                            ->join($tabel3, $on2,'inner')
                            ->getWhere($where)
                            ->getResult();   
    
        }

        public function join3s($tabel1, $tabel2, $tabel3, $on, $on2){
            return $this->db->table($tabel1)  
                            ->join($tabel2, $on,'inner')
                            ->join($tabel3, $on2,'inner')
                            ->get()
                            ->getResult();   
    
        }
        public function getById($id)
        {
            return $this->where('id_user', $id)->first();
        }

        public function betweenjoin1($table1,$table2,$table3,$on1,$on2,$tanggalAwal, $tanggalAkhir)
{
        return $this->db->table($table1)
        ->join($table2,$on1)
        ->join($table3,$on2)
        ->where('donasi.tanggal>=', $tanggalAwal)
        ->where('donasi.tanggal<=', $tanggalAkhir)
        ->get()
        ->getResult();
}






    }