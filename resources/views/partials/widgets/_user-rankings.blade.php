<div class="content">
    <h3> <i class="fa fa-user"></i> User rankings </h3>
    <div class="content">
        <table class="table">
            <thead>
            <tr>
                <th>Pos</th>
                <th>User</th>
                <th>Points</th>
            </tr>
            </thead>

            <tbody>
                <?php $index = 0; ?>
                @foreach($rankedUsers as $user)
                    <tr>
                        <td>{{ $index += 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->total }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
