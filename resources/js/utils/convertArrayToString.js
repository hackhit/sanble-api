let convertArrayToObject = (object, key) => {
    var result = {};
    for (var i = 0; i < object.length; ++i) {
        if (object[i] !== undefined) result[object[i][key]] = object[i];
    }
    return result;
};

export default convertArrayToObject;
