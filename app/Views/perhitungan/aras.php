<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>
<div class="pagetitle">
    <h1>Perhitungan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Perhitungan Aras </a></li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tabel Data Alternatif</h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <?php
                                foreach ($kriteria as $row) {
                                ?>
                                    <th scope="col"><?= $row['kriteria'] ?></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($penduduk as $row) {
                            ?>
                                <tr>
                                    <th scope="row"><?= $no++ ?></th>
                                    <td><?= $row['nama'] ?></td>
                                    <?php
                                    foreach ($all as $key) {
                                        if ($row['id_penduduk'] == $key['id_penduduk']) {
                                    ?>
                                            <td><?= $key['keterangan'] ?></td>
                                    <?php
                                        }
                                    } ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tabel Hasil Konfersi Data Alternatif</h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Alternatif</th>
                                <th scope="col">Nama</th>
                                <?php
                                $c = 1;
                                foreach ($kriteria as $row) {
                                ?>
                                    <th scope="col"><?= 'C' . $c++ ?></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $a = 1;
                            foreach ($penduduk as $row) {
                            ?>
                                <tr>
                                    <th scope="row"><?= 'A' . $a++ ?></th>

                                    <td><?= $row['nama'] ?></td>
                                    <?php
                                    foreach ($all as $key) {
                                        if ($row['id_penduduk'] == $key['id_penduduk']) {
                                    ?>
                                            <td><?= $key['nilai'] ?></td>
                                    <?php
                                        }
                                    } ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tabel Alternatif Untuk Setiap Kriteria</h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <?php
                                $jumlah_kriteria = count($kriteria);
                                ?>
                                <th scope="col" rowspan="2">Alternatif</th>
                                <th scope="col" colspan="<?= $jumlah_kriteria ?>" class="text-center">Kriteria</th>
                            </tr>
                            <tr>
                                <?php
                                $c = 1;
                                foreach ($kriteria as $row) {
                                ?>
                                    <th scope="col"><?= 'C' . $c++ ?></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-info">
                                <th scope="row">A0</th>
                                <?php
                                $a0 = [];
                                foreach ($penduduk as $row) {
                                    foreach ($all as $key) {
                                        if ($row['id_penduduk'] == $key['id_penduduk']) {
                                            $a0[$key['id_kriteria']][$key['jenis']][] = $key['nilai'];
                                        }
                                    }
                                }
                                // var_dump($a0);
                                $nilai;
                                foreach ($a0 as $key => $data) {
                                    // echo $key . '<br>';
                                    foreach ($data as $jenis => $value) {
                                        if ($jenis == 'Benefit') {
                                            $nilai = max($value);
                                        } elseif ($jenis == 'Cost') {
                                            $nilai = min($value);
                                        }
                                    }

                                    echo '<th scope="col">' . $nilai . '</th>';
                                }
                                ?>
                            </tr>
                            <?php
                            $a = 1;
                            foreach ($penduduk as $row) {
                            ?>
                                <tr>
                                    <th scope="row"><?= 'A' . $a++ ?></th>
                                    <?php
                                    foreach ($all as $key) {
                                        if ($row['id_penduduk'] == $key['id_penduduk']) {
                                    ?>
                                            <td><?= $key['nilai'] ?></td>
                                    <?php
                                        }
                                    } ?>
                                </tr>
                            <?php }

                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>Kriteria</td>
                                <?php
                                foreach ($kriteria as $kri) {
                                ?>
                                    <td><?= $kri['jenis'] ?></td>
                                <?php
                                }
                                ?>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Matriks</h5>
                    <div class="row">
                        <div class="col-3 d-flex align-items-center justify-content-center">
                            <h5 class="card-title">Matrix =</h5>
                        </div>
                        <div class="col-9">
                            <table class=" table">
                                <tbody>

                                    <?php
                                    foreach ($a0 as $key => $data) {
                                        // echo $key . '<br>';
                                        foreach ($data as $jenis => $value) {
                                            if ($jenis == 'Benefit') {
                                                $nilai = max($value);
                                            } elseif ($jenis == 'Cost') {
                                                $nilai = min($value);
                                            }
                                        }

                                        echo '<td>' . $nilai . '</td>';
                                    }
                                    foreach ($penduduk as $row) {
                                    ?>
                                        <tr>
                                            <?php
                                            foreach ($all as $key) {
                                                if ($row['id_penduduk'] == $key['id_penduduk']) {
                                            ?>
                                                    <td><?= $key['nilai'] ?></td>
                                            <?php
                                                }
                                            } ?>
                                        </tr>
                                    <?php }

                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Normalisasi Matriks</h5>
                    <div class="row">
                        <p class="ml-5">Tahap Pertama</p>
                        <div class="col-3 d-flex align-items-center justify-content-center">
                            <h5 class="card-title">X =</h5>
                        </div>
                        <div class="col-9">
                            <table class=" table">
                                <tbody>

                                    <?php
                                    $normalisasi_1 = [];
                                    foreach ($a0 as $key => $data) {
                                        // echo $key . '<br>';
                                        foreach ($data as $jenis => $value) {
                                            if ($jenis == 'Benefit') {
                                                $nilai = max($value);
                                                $nilai_normalisas_1 = $nilai;
                                                echo '<td>' . $nilai . '</td>';
                                            } elseif ($jenis == 'Cost') {
                                                $nilai = min($value);
                                                $nilai_normalisas_1 = 1 / $nilai;
                                                echo '<td>' . round($nilai_normalisas_1, 2) . '</td>';
                                            }

                                            $normalisasi_1[$key][] = $nilai_normalisas_1;
                                        }
                                    }
                                    foreach ($penduduk as $row) {
                                    ?>
                                        <tr>
                                            <?php
                                            foreach ($all as $key) {
                                                if ($row['id_penduduk'] == $key['id_penduduk']) {
                                                    if ($key['jenis'] == 'Benefit') {
                                                        echo '<td>' . $key['nilai'] . '</td>';
                                                        $nilai_normalisas_1 = $key['nilai'];
                                                    } else {
                                                        $nilai_normalisas_1 = 1 / $key['nilai'];
                                            ?>
                                                        <td><?= round($nilai_normalisas_1, 2) ?></td>
                                            <?php
                                                    }
                                                    array_push($normalisasi_1[$key['id_kriteria']], $nilai_normalisas_1);
                                                }
                                            } ?>
                                        </tr>
                                    <?php }
                                    foreach ($normalisasi_1 as $id_kriteria => $data) {
                                        $jumlah_normalisasi_1[$id_kriteria] = array_sum($data);
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <p class="ml-5">Tahap Kedua</p>
                        <div class="col-3 d-flex align-items-center justify-content-center">
                            <h5 class="card-title">R =</h5>
                        </div>
                        <div class="col-9">
                            <table class=" table">
                                <tbody>
                                    <?php
                                    foreach ($a0 as $key => $data) {
                                        // echo $key . '<br>';
                                        foreach ($data as $jenis => $value) {
                                            if ($jenis == 'Benefit') {
                                                $nilai = max($value);
                                                $nilai_normalisas_1 = $nilai;
                                            } elseif ($jenis == 'Cost') {
                                                $nilai = min($value);
                                                $nilai_normalisas_1 = 1 / $nilai;
                                            }
                                            $nilai_normalisas_2 = round($nilai_normalisas_1 / $jumlah_normalisasi_1[$key], 3);
                                        }
                                        // var_dump($jumlah_normalisasi_1[$key]);
                                        echo '<td>' . $nilai_normalisas_2 . '</td>';
                                    }
                                    foreach ($penduduk as $row) {
                                    ?>
                                        <tr>
                                            <?php
                                            foreach ($all as $key) {
                                                if ($row['id_penduduk'] == $key['id_penduduk']) {
                                                    if ($key['jenis'] == 'Benefit') {
                                                        $nilai_normalisas_1 = $key['nilai'];
                                                        $nilai_normalisas_2 = round($nilai_normalisas_1 / $jumlah_normalisasi_1[$key['id_kriteria']], 3);
                                                        echo '<td>' .  $nilai_normalisas_2 . '</td>';
                                                    } elseif ($key['jenis'] == 'Cost') {
                                                        $nilai_normalisas_1 = 1 / $key['nilai'];
                                                        $nilai_normalisas_2 = round($nilai_normalisas_1 / $jumlah_normalisasi_1[$key['id_kriteria']], 3);
                                                        echo '<td>' .  $nilai_normalisas_2 . '</td>';
                                                    }
                                                }
                                            } ?>
                                        </tr>
                                    <?php }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Bobot Matriks</h5>
                    <div class="row">
                        <div class="col-3 d-flex align-items-center justify-content-center">
                            <h5 class="card-title">D =</h5>
                        </div>
                        <div class="col-9">
                            <table class=" table">
                                <tbody>
                                    <?php
                                    foreach ($a0 as $key => $data) {
                                        // echo $key . '<br>';
                                        foreach ($data as $jenis => $value) {
                                            if ($jenis == 'Benefit') {
                                                $nilai = max($value);
                                                $nilai_normalisas_1 = $nilai;
                                            } elseif ($jenis == 'Cost') {
                                                $nilai = min($value);
                                                $nilai_normalisas_1 = 1 / $nilai;
                                            }

                                            $nilai_normalisas_2 = $nilai_normalisas_1 / $jumlah_normalisasi_1[$key];
                                            $hasil_normalisasi_2[$key] = $nilai_normalisas_2;
                                        }

                                        // echo '<td>' . $nilai_normalisas_2 . '</td>';
                                    }
                                    foreach ($kriteria as $kriter) {
                                        echo '<td>' . round($hasil_normalisasi_2[$kriter['id_kriteria']] * $kriter['bobot'], 3) . '</td>';
                                    }
                                    foreach ($penduduk as $row) {
                                    ?>
                                        <tr>
                                            <?php
                                            foreach ($all as $key) {
                                                if ($row['id_penduduk'] == $key['id_penduduk']) {
                                                    if ($key['jenis'] == 'Benefit') {
                                                        $nilai_normalisas_1 = $key['nilai'];
                                                    } elseif ($key['jenis'] == 'Cost') {
                                                        $nilai_normalisas_1 = 1 / $key['nilai'];
                                                    }
                                                    $nilai_normalisas_2 = $nilai_normalisas_1 / $jumlah_normalisasi_1[$key['id_kriteria']];
                                                    echo '<td>' . round($nilai_normalisas_2 * $key['bobot'], 3) . '</td>';
                                                }
                                            } ?>
                                        </tr>
                                    <?php }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Nilai Fungsi Optimum</h5>
                    <div class="row">
                        <div class="col-3 d-flex align-items-center justify-content-center">
                            <h5 class="card-title">S =</h5>
                        </div>
                        <div class="col-9">
                            <table class=" table">
                                <tbody>
                                    <?php
                                    foreach ($a0 as $key => $data) {
                                        // echo $key . '<br>';
                                        foreach ($data as $jenis => $value) {
                                            if ($jenis == 'Benefit') {
                                                $nilai = max($value);
                                                $nilai_normalisas_1 = $nilai;
                                            } elseif ($jenis == 'Cost') {
                                                $nilai = min($value);
                                                $nilai_normalisas_1 = 1 / $nilai;
                                            }
                                            $nilai_normalisas_2 = $nilai_normalisas_1 / $jumlah_normalisasi_1[$key];
                                            $hasil_normalisasi_2[$key] = $nilai_normalisas_2;
                                        }

                                        // echo '<td>' . $nilai_normalisas_2 . '</td>';
                                    }
                                    foreach ($kriteria as $kriter) {
                                        $nilaiD = $hasil_normalisasi_2[$kriter['id_kriteria']] * $kriter['bobot'];
                                        $si[] = $nilaiD;
                                        echo '<td>' . round($nilaiD, 3) . '</td>';
                                    }
                                    echo '<td> = ' . round(array_sum($si), 3) . '</td>';
                                    foreach ($penduduk as $row) {
                                    ?>
                                        <tr>
                                            <?php
                                            foreach ($all as $key) {
                                                if ($row['id_penduduk'] == $key['id_penduduk']) {
                                                    if ($key['jenis'] == 'Benefit') {
                                                        $nilai_normalisas_1 = $key['nilai'];
                                                    } elseif ($key['jenis'] == 'Cost') {
                                                        $nilai_normalisas_1 = 1 / $key['nilai'];
                                                    }
                                                    $nilai_normalisas_2 = $nilai_normalisas_1 / $jumlah_normalisasi_1[$key['id_kriteria']];
                                                    $nilaiDD = $nilai_normalisas_2 * $key['bobot'];
                                                    $sidd[$key['id_penduduk']][] = $nilaiDD;
                                                    echo '<td>' . round($nilaiDD, 3) . '</td>';
                                                }
                                            }
                                            $jumlahssd = array_sum($sidd[$row['id_penduduk']]);
                                            echo '<td> = ' . round($jumlahssd, 3) . '</td>';
                                            ?>
                                        </tr>
                                    <?php }
                                    // var_dump($sidd);
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tingkat Peringkat</h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kode</th>
                                <th scope="col">Nama Alternatif</th>
                                <th scope="col">Nilai Optimal(S)</th>
                                <th scope="col">Nilai Akhir(K)</th>
                                <!-- <th scope="col">Peringkat</th> -->
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($a0 as $key => $data) {
                                // echo $key . '<br>';
                                foreach ($data as $jenis => $value) {
                                    if ($jenis == 'Benefit') {
                                        $nilai = max($value);
                                        $nilai_normalisas_1 =  $nilai;
                                    } elseif ($jenis == 'Cost') {
                                        $nilai = min($value);
                                        $nilai_normalisas_1 = 1 / $nilai;
                                    }

                                    $nilai_normalisas_2 = $nilai_normalisas_1 / $jumlah_normalisasi_1[$key];
                                    $hasil_normalisasi_2[$key] = $nilai_normalisas_2;
                                }

                                // echo '<td>' . $nilai_normalisas_2 . '</td>';
                            }
                            foreach ($kriteria as $kriter) {
                                $nilaiD = $hasil_normalisasi_2[$kriter['id_kriteria']] * $kriter['bobot'];
                                $sino[] = $nilaiD;
                            }
                            $nilai_optimums0 = array_sum($sino);
                            // echo $nilai_optimum;
                            $nomer = 1;
                            $a = 1;
                            $data_nilai_akhir = [];
                            foreach ($penduduk as $row) {
                            ?>

                                <?php
                                foreach ($all as $key) {
                                    if ($row['id_penduduk'] == $key['id_penduduk']) {
                                        if ($key['jenis'] == 'Benefit') {
                                            $nilai_normalisas_1 = $key['nilai'];
                                        } elseif ($key['jenis'] == 'Cost') {
                                            $nilai_normalisas_1 = 1 / $key['nilai'];
                                        }
                                        $nilai_normalisas_2 = $nilai_normalisas_1 / $jumlah_normalisasi_1[$key['id_kriteria']];
                                        $nilaiDD = $nilai_normalisas_2 * $key['bobot'];
                                        $siddno[$key['id_penduduk']][] = $nilaiDD;
                                    }
                                }

                                $jumlahssdno = array_sum($siddno[$row['id_penduduk']]);
                                $nilai_opti[$row['id_penduduk']] = $jumlahssdno;
                                $na[$row['id_penduduk']] = $nilai_opti[$row['id_penduduk']] / $nilai_optimums0;
                                array_push($data_nilai_akhir, [
                                    'id_penduduk' => $row['id_penduduk'],
                                    'kode' => 'A' . $a++,
                                    'nama' =>  $row['nama'],
                                    'nilai_optimal' => round($jumlahssdno, 3),
                                    'nilai_akhir' => round($na[$row['id_penduduk']], 3),
                                ]);
                            }
                            $keys = array_column($data_nilai_akhir, 'nilai_akhir');
                            array_multisort($keys, SORT_DESC, $data_nilai_akhir);
                            foreach ($data_nilai_akhir as $na) {
                                ?>
                                <tr>
                                    <td><?= $nomer++ ?></td>
                                    <td><?= $na['kode'] ?></td>
                                    <td><?= $na['nama'] ?></td>
                                    <td><?= $na['nilai_optimal'] ?></td>
                                    <td><?= $na['nilai_akhir'] ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>


<?= $this->endSection() ?>