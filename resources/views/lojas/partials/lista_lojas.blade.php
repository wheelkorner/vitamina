@if(isset($lojas))

    <div class="col-lg-12">
        <div class="card card-primary card-outline">

            <div class="card-header">
                <h3 class="card-title">Lista de Lojas</h3>
                <div class="card-tools">
                    <div class="card-tools">
                        <a href="{{ route('lojas.create')}}" type="btn btn-tool" class="btn btn-outline-secondary btn-block btn-flat"> <i class="fa fa-store" style="margin-right: 5px;"></i> Adicionar Loja </a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="table-responsive">

                            <table class="table no-margin table-striped tabela dataTable dtr-inline" aria-label="completas">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Nome Loja</th>
                                        <th>CNPJ</th>
                                        <th>Cidade</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($lojas as $loja)
                                        <tr>
                                            <td width="15%"> {{$loja->cd_pro_negocio}} </td>
                                            <td width="55%"> {{$loja->razao_social}} </td>
                                            <td width="15%"> {{$loja->cnpj}} </td>
                                            <td width="15%"> {{$loja->cidade}} </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer border-2">
            </div>

        </div>
    </div>

@endif
