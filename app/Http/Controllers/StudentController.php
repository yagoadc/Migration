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
        //valida a request recebida, nos campos 'nome' e 'dre', de acordo com as regras especificadas
        //na string do lado do nome do campo.
        $this->validate($request,[
            'nome' => 'required',
            'dre' => 'required|min:9|max:9|unique:students'
        ]);

        //cria uma nova instância na tabela 'students' (referenciada pelo model Student), usando os
        //dados que vieram na request para preencher os campos desta nova instância.
        \App\Student::create($request->all());


        //retorna a view anterior (no caso seria a view estudantes) com uma variável $success que contem
        //a mensagem 'Estudante criado com sucesso.' e pode ser acessada através da view com o método
        //session('success')
        return back()->with(['success' => 'Estudante criado com sucesso.']);
    }

    /**
     * Método que serviria para mostrar a view que contem as 
     * informações de um único estudante (referenciado pela sua id).
     * O método receberia esta id através da URL, com uma rota GET.
     * Não é usado pois todas as informações relevantes de cada estudante já são mostradas na tabela da
     * view principal.
     */
    public function show($id)
    {
        //
    }

    /**
     * Analogamente ao método show, o método edit retorna a view onde é possível editar um único estudante.
     * Como estou fazendo esta edição através de modal, não preciso deste método também.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Método que edita uma instância já existente de estudante. O parâmetro $request é enviado automaticamente 
     * ao chamar update com POST e o parâmetro $id deve ser enviado explicitamente na view, também por POST.
     * (no caso, o método que o laravel usa para resource controllers e que é o que vocês verão pelo route:list 
     * é o PUT)
     * Para mais sobre resource controllers: https://laravel.com/docs/5.3/controllers#resource-controllers
     */
    public function update(Request $request, $id)
    {
        //encontra o estudante que queremos editar através de sua id.
        $s = \App\Student::find($id);

        //checa se eu modifiquei o dre já existente
        //se eu não o modifiquei, valido apenas o nome enviado e edito o estudante de acordo.
        if($s->dre == $request->dre){
            $this->validate($request,[
                'nome' => 'required',
            ]);

            $s->update(['nome' => $request->nome]);

            return back()->with(['success' => 'Estudante editado com sucesso.' ]);
        }

        //caso tenha alterado o dre, faço a validação de nome e dre e prossigo com a edição do estudante.
        $this->validate($request,[
            'nome' => 'required',
            'dre' => 'required|min:9|max:9|unique:students'
        ]);

        $s->update($request->all());

        return back()->with(['success' => 'Estudante criado com sucesso.' ]);
    }

    /**
     * Delete um estudante, referenciado por sua id.
     * A $id é passada por GET. 
     * (no caso, o método que o laravel usa para resource controllers e que é o que vocês verão pelo route:list 
     * é o DELETE)
     * Para mais sobre resource controllers: https://laravel.com/docs/5.4/controllers#resource-controllers
     */
    public function destroy($id)
    {
        
        //deleta a instância de estudante que tem o campo 'id' igual ao valor em $id
        \App\Student::destroy($id);

        //retorna à view anterior.
        return back();
    }
}
