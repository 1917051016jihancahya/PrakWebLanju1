<?php

namespace App\Controllers;
use App\Controllers\BaseController;

class AdminPostsController extends BaseController
{

	
	public function index()
	{
		$PostModel = model("PostModel");
		$data =[
			'posts' => $PostModel->findAll()
		];
		return view('posts/index',$data);
	}

    public function create()
	{
		session();
		$data =[
			'validation' => \Config\Services::validation(),
		];
		return view('posts/create',$data);
	}
    public function store()
	{
		$valid = $this->validate([
			"judul" =>[
				"label" => "Judul",
				"rules" => "required",
				"errors" => "{field} Harus Diisi!"
			],

			"slug" => [
				"label" => "Slug",
				"rules" => "required|is_unique[posts.slug]",
				"errors" => [
					"required" => "{field} Harus Diisi!",
					"is_unique" => "{field} sudah ada!",
				]
			],
			"kategori" =>[
				"label" => "kategori",
				"rules" => "required",
				"errors" => "{field} Harus Diisi!"
			],
			"author" =>[
				"label" => "author",
				"rules" => "required",
				"errors" => "{field} Harus Diisi!"
			],
			"deskripsi" =>[
				"label" => "deskripsi",
				"rules" => "required",
				"errors" => "{field} Harus Diisi!"
			],
		]);

		if($valid){
		$data = [
			'judul' => $this->request->getVar('judul'),
			'slug' => $this->request->getVar('slug'),
			'kategori' => $this->request->getVar('kategori'),
			'author' => $this->request->getVar('author'),
			'deskripsi' => $this->request->getVar('deskripsi'),
		];

		$PostModel = model("PostModel");
		$PostModel->insert($data);
		return redirect()->to(base_url('admin/posts'));
		} else{
			return redirect()->to(base_url('admin/posts/create'))->withInput()->with('validation',$this->validator);
		}

	}

	public function delete($id){

		$PostModel = model("PostModel");
		$PostModel->delete($id);
		return redirect()->to(base_url('admin/posts'));
	}

	public function edit($slug){
		$PostModel = model("PostModel");
		session();
		$data = [
			'validation' => \Config\Services::validation(),
            'posts' => $PostModel->getPost($slug),
	
        ];
		return view('posts/edit',$data);
	}

	public function update($post_id)
    {
		$PostModel = model("PostModel");

		$postLama = $PostModel->getPost($this->request->getVar('slug'));
		if($postLama['judul'] == $this->request->getVar('judul')){
			$rule_judul = 'required';
		} else{
			$rule_judul = 'required|is_unique[posts.judul]';
		}

		if(!$this->validate([
			'judul' => [
				'rules' => $rule_judul,
				'errors' =>[
					'required' => '{field} harus diisi',
					'is_unique' => '{field} sudah terdaftar'
				]
			]
		])) {
			$validation = \Config\Services::validation();
			return redirect()->to('admin/posts/edit/' .$this->request->getVar('slug'))->withInput()->with('validation',$this->validator);
		}
		
		$slug = url_title($this->request->getVar('judul'), '-', true);
		$PostModel->save([
			'post_id' => $post_id,
			'judul' => $this->request->getVar('judul'),
			'slug' => $this->request->getVar('slug'),
			'kategori' => $this->request->getVar('kategori'),
			'author' => $this->request->getVar('author'),
			'deskripsi' => $this->request->getVar('deskripsi'),
		]);
		return redirect()->to('/admin/posts');
	}
    

}