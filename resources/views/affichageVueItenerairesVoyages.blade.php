@extends('layouts.layoutAffichageVueItenerairesVoyages')
@section('contenu')
<div class="row">
                    <div class="col-12">
                        
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title m-b-0">Les differents Destinations </h5>
                            </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>
                                                    <label class="customcheckbox m-b-20">
                                                        <input type="checkbox" id="mainCheckbox" />
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </th>
                                                <th scope="col">Ville de depart</th>
                                                <th scope="col">Ville d'arrivee</th>
                                                <th scope="col">Prix en (FCFA)</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="customtable">
                                            <tr>
                                                <th>
                                                    <label class="customcheckbox">
                                                        <input type="checkbox" class="listCheckbox" />
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </th>
                                                <td>Lome</td>
                                                <td>Atakpame</td>
                                                <td>2500</td>
                                                <td>Reserver</td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <label class="customcheckbox">
                                                        <input type="checkbox" class="listCheckbox" />
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </th>
                                                <td>Lome</td>
                                                <td>Blitta</td>
                                                <td>4000</td>
                                                <td>Reserver</td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <label class="customcheckbox">
                                                        <input type="checkbox" class="listCheckbox" />
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </th>
                                                <td>Lome</td>
                                                <td>Sotouboua</td>
                                                <td>5000</td>
                                                <td>Reserver</td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <label class="customcheckbox">
                                                        <input type="checkbox" class="listCheckbox" />
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </th>
                                                <td>Lome</td>
                                                <td>Adjengre</td>
                                                <td>5500</td>
                                                <td>Reserver</td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <label class="customcheckbox">
                                                        <input type="checkbox" class="listCheckbox" />
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </th>
                                                <td>Lome</td>
                                                <td>Sokode</td>
                                                <td>6500</td>
                                                <td>Reserver</td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <label class="customcheckbox">
                                                        <input type="checkbox" class="listCheckbox" />
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </th>
                                                <td>Lome</td>
                                                <td>Kara</td>
                                                <td>7500</td>
                                                <td>Reserver</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                        
                        
                    </div>
                </div>
@endsection