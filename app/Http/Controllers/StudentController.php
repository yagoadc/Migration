<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class StudentController extends Controller
{
    /**
     * Função que retorna a view principal do recurso Estudante.
     */
    public function index()
    {
        /**
         * Percorre toda a tabela 'students' (referenciada pelo model Student) e armazena os valores de
         * todas as instâncias na variável $students. A variável $students, então, se torna uma Collection, que é
         * como um array especial do Laravel, que tem alguns métodos especiais para tratamento de dados.
         */
        $students = \App\Student::all(); 


        /**
         * Retorna a view 'estudantes' (que o Laravel localiza em resources/views/estudantes.blade.php)
         * passando os dados da variável local $students para uma outra variável acessável pela view, que se
         * chamará 'students' também.
         */
        return view('estudantes', ['students' => $students]);
    }

    /**
     * Função que seria usada para retornar a view responsável pela criação de um novo estudante. 
     * Não estou usando pois faço a criação de um novo estudante através de um modal.
     */
    public function create()
    {
        //
    }

    /**
     * Função responsável por armazenar um novo estudante no banco de dados.
     * Recebe automaticamente como parâmetro, a requisição POST enviada pelo 
     * formulário que chama esta função em seu atributo action
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nome' => 'required',
            'dre' => 'required|min:9|max:9|unique:students'
        ]);

        \App\Student::create($request->all());

        return back()->with(['success' => 'Estudante criado com sucesso.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $s = \App\Student::find($id);


        if($s->dre == $request->dre){
            $this->validate($request,[
                'nome' => 'required',
            ]);

            $s->update(['nome' => $request->nome]);

            return back()->with(['success' => 'Estudante editado com sucesso.' ]);
        }


        $this->validate($request,[
            'nome' => 'required',
            'dre' => 'required|min:9|max:9|unique:students'
        ]);

        $s->update($request->all());

        return back()->with(['success' => 'Estudante criado com sucesso.' ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \App\Student::destroy($id);

        return back();
    }
}
