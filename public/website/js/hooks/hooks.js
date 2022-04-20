
export function useState(data=undefined) {
    var state = data
    
    function getState() {
        return state;
    }
    function setState(setState) {
        state = setState;
    }

    return [getState, setState];
}