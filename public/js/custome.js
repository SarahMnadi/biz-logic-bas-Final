// organizationManage


function store_organizations() {
    let url = "{{ route('storeOrganization') }}";
    $.ajax({
        url: url,
        type: 'POST',
        data: new FormData(document.getElementById('addOrganizationForm')),
        contentType: false,
        processData: false,
        success: function (res) {
            document.getElementById('addOrganizationForm').reset();
            let organization = res.newOrganization;
            $('#tableData').prepend('<tr> <td class="filterable-cell" style="width: 5%">' +
                1 + '</td> <td class="filterable-cell">' +
                organization.organization_id + '</td> <td class="filterable-cell">' +
                organization.organization_name + '</td> <td class="filterable-cell">' +
                organization.organization_phone_number +
                '</td> <td class="filterable-cell" style="width: 20%">' +
                organization.organization_email +
                '</td> <td class="filterable-cell" style="width: 8%">' +
                organization.organization_address +
                '</td> <td class="project-actions text-right" style="width: 22%"> <a class="btn btn-primary btn-sm filterable-cell m-1" href="#"><i class="fas fa-folder pr-1"> </i>View</a>' +
                '<a class="btn btn-info btn-sm filterable-cell m-1" href="#" onclick=""><i class="fas fa-pencil-alt pr-1"> </i>Edit</a>' +
                ' <a class="btn btn-danger btn-sm filterable-cell" href="#" onclick=""><i class="fas fa-trash pr-1"> </i>Delete</a></td> </tr>'
            );

        }
    });
}

function query_all_organizations() {
    let url = "{{ route('getLatestFiveOrganizations') }}";
    $.ajax({
        url: url,
        type: 'GET',
        contentType: false,
        processData: false,
        success: function (res) {
            if (res.organizations.length < 1) {
                $('#tableData').text('There is no Organization Registered')
            }

            let sn = 1;
            res.organizations.map(organization => {
                let id = organization.organization_id;
                $('#tableData').append('<tr> <td class="filterable-cell" style="width: 5%">' +
                    sn + '</td> <td class="filterable-cell">' +
                    organization.organization_id + '</td> <td class="filterable-cell">' +
                    organization.organization_name + '</td> <td class="filterable-cell">' +
                    organization.organization_phone_number +
                    '</td> <td class="filterable-cell" style="width: 20%">' +
                    organization.organization_email +
                    '</td> <td class="filterable-cell" style="width: 8%">' +
                    organization.organization_address +
                    '</td> <td class="project-actions text-right" style="width: 22%"> <a class="btn btn-primary btn-sm filterable-cell m-1" href="#"><i class="fas fa-folder pr-1"> </i>View</a>' +
                    '<a class="btn btn-info btn-sm filterable-cell m-1" onclick="show_edit_organization(' + id + ')"><i class="fas fa-pencil-alt pr-1"> </i>Edit</a>' +
                    ' <a class="btn btn-danger btn-sm filterable-cell" href="#" onclick=""><i class="fas fa-trash pr-1"> </i>Delete</a></td> </tr>');
                sn++;
            });
        }
    });
}

