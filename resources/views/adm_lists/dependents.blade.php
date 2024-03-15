<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @php
                        foreach ($dependent as $rs) {
                            echo '<div class="flex flex-col text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 shadow-md bg-clip-border rounded-xl ">';
                            echo '<div class="p-6 ">';
                            echo '<h5 class="block mb-5 font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900 cursor-default">';
                            echo $rs->name;
                            echo '</h5>';
                            echo '<p class="block font-sans text-md antialiased font-light leading-relaxed text-inherit cursor-default">';
                            echo 'Data de nascimento: ' . date('d/m/Y', strtotime($rs->birth_date));
                            echo '</p>';
                            echo '</div>';
                            echo '</div>';
                        }

                    @endphp
                </div>
            </div>
        </div>